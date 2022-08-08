<?php
namespace App\Helpers;

use Base64Url\Base64Url;
use CBOR\CBOREncoder;




// COSEPublicKey type
define('COSEKEYS', array(
    'kty' => 1,
    'alg' => 3,
    'crv' => -1,
    'x'   => -2,
    'y'   => -3,
    'n'   => -1,
    'e'   => -2
));

// COSEPublicKey alg type
define('COSEKTY', array(
    'OKP' => 1,
    'EC2' => 2,
    'RSA' => 3
));


// COSEPublicKey RSA alg scheme
define('COSERSASCHEME', array(
    '-3' => [
        'padding' =>'pss',
        'hash' => 'sha256'],
    '-39' => [
        'padding' =>'pss',
        'hash' => 'sha512'],
    '-38' => [
        'padding' =>'pss',
        'hash' => 'sha384'],
    '-65535' => [
        'padding' =>'pkcs1',
        'hash' => 'sha1'],
    '-257' => [
        'padding' =>'pkcs1',
        'hash' => 'sha256'],
    '-258' => [
        'padding' =>'pkcs1',
        'hash' => 'sha384'],
    '-259' => [
        'padding' =>'pkcs1',
        'hash' => 'sha512'],
));

// COSEPublicKey ECC alg curve
define('COSECRV', array(
    '1' => 'p256',
    '2' => 'p384',
    '3' => 'p521'
));

// COSEPublicKey alg hash
define('COSEALGHASH', array(
    '-257' => 'sha256',
    '-258' => 'sha384',
    '-259' => 'sha512',
    '-65535' => 'sha1',
    '-39' => 'sha512',
    '-38' => 'sha384',
    '-37' => 'sha256',
    '-260' => 'sha256',
    '-261' => 'sha512',
    '-7' => 'sha256',
    '-36' => 'sha512'
));

class CryptoAuth {

public static function parseAuthData($attestation_object)
{
    $attestation_object_bin = Base64Url::decode($attestation_object);
    $attestation_cbor = CBOREncoder::decode($attestation_object_bin);
    $attestation_authdata_hex = bin2hex($attestation_cbor['authData']->get_byte_string());
    $buffer = $attestation_authdata_hex;

    // One byte is 2 hex character
    $rpIdHash = substr($buffer, 0, 64);      $buffer = substr($buffer, 64);
    $flagsBuf = substr($buffer, 0, 2);       $buffer = substr($buffer, 2);
    $flagsInt =  hexdec($flagsBuf);
    $flags = array(
        'up' => boolval(($flagsInt & 0x01)),
        'uv' => boolval(($flagsInt & 0x04)),
        'at' => boolval(($flagsInt & 0x40)),
        'ed' => boolval(($flagsInt & 0x80)),
        'flagsInt' => $flagsInt
    );

    $counterBuf = substr($buffer, 0, 8);     $buffer = substr($buffer, 8);
    $counter = hexdec($counterBuf);

    $aaguid = null;
    $credID = null;
    $COSEPublicKey = null;

    if($flags['at']){
        $aaguid = substr($buffer, 0, 32);          $buffer = substr($buffer, 32);
        $credIDLenBuf = substr($buffer, 0, 4);     $buffer = substr($buffer, 4);
        // one byte is 2 hex character
        $credIDLen = hexdec($credIDLenBuf) * 2;
        $credID = substr($buffer, 0, $credIDLen);  $buffer = substr($buffer, $credIDLen);
        $COSEPublicKey = $buffer;
    }

    // parse CosePublickey
    $cosepub_hex = hex2bin($COSEPublicKey);
    $pubKeyCose = CBOREncoder::decode($cosepub_hex);

    if($pubKeyCose[COSEKEYS['kty']] == COSEKTY['EC2'] ){
        $x = $pubKeyCose[COSEKEYS['x']];
        $y = $pubKeyCose[COSEKEYS['y']];

        // public key type
        $publicKeyType = 'ec';
        // public key in hex
        $publicKeyHex = '0x04'.$x.$y;
        // curve
        $publicKeyScheme = COSECRV[$pubKeyCose[COSEKEYS['crv']]];
        //hash
        $publicKeyHash = COSEALGHASH[$pubKeyCose[COSEKEYS['alg']]];

    }else if($pubKeyCose[COSEKEYS['kty']] == COSEKTY['RSA']) {
        $signingScheme = COSERSASCHEME[$pubKeyCose[COSEKEYS['alg']]];

        // public key type
        $publicKeyType = 'rsa';
        // public key in hex
        $publicKeyHex = bin2hex($pubKeyCose[COSEKEYS['n']]->get_byte_string());
        // padding
        $publicKeyScheme = $signingScheme['padding'];
        // hash
        $publicKeyHash = $signingScheme['hash'];


    }




    return array(
        'rpIdHash' => $rpIdHash,
        'counter'  => $counter,
        'credID'   => $credID,
        'COSEPublicKey' => [
            'type' => $publicKeyType,
            'key' => $publicKeyHex,
            'scheme' => $publicKeyScheme,
            'hash' => $publicKeyHash
        ]
    );



}

}
