<?php

namespace App\Http\Controllers;

use App\Models\PublicKey;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Random;
use Base64Url\Base64Url;
use App\Helpers\CryptoAuth;


class FIDOController extends Controller
{



    public function registerRequest()
    {
        //  random bytes binary. 32 bytes = 256bit
        // convert challenge to base64url
        $random_challenge = Base64Url::encode(random_bytes(32));
        $random_userId = Base64Url::encode(random_bytes(32));
//        while(true)
//        {
//            /* check random userid, if generated random already exist in database
//                make new random and do it until generated random has no equal in database
//            */
//
//            $random_userid = bin2hex(random_bytes(32));
//            $check_userid = User::where('user_id', $random_userid)->first();
//            // break loop-while when newly generated random userid has no equal in database user
//            if(!$check_userid) break;
//        }

        // Save random to database
        $random = new Random;
        $random->challenge = $random_challenge;
        $random->user_id = $random_userId;
        $random->type = 'register';
        $random->timeout = now()->addMinutes(60) ;
        $random->save();


        // create Request Register Json
        $request_option = array();

        $rp = array(
            "id" => "testfido.com",
            "name" => "Testfido QR",
            "icon" => "https://testfido.com/images/rp-icon.png"
        );

        $user = array(
            "id" => $random_userId
        );

        $request_option = array(
            "challenge" => $random_challenge,
            "rp" => $rp,
            "user" => $user
        );


        return response()->json($request_option);

    }


    public function registerResponse(Request $req)
    {
        // first check if all 3 value exist
        if (!$req->has(['name', 'email', 'credential_id', 'attestation_object', 'clientdata_json']))
            return response()->json([
                'status' => 'fail',
                'message' => "some input is missing"]);

        /**
         * put POST data to variable
         */
        // credential_id is in baseu4l text format
        $credential_id      = $req->credential_id;
        $clientdata_json    = $req->clientdata_json;
        $attestation_object = $req->attestation_object;
        $email              = $req->email;
        $name               = $req->name;

        // check if email has been register before
        $isNewEmail = User::where('email', $email)->first();
        if ($isNewEmail) return response()->json([
            'status' => 'fail',
            'message' => "Email has been use for register before"
        ]);

        /**
         * Check clientDataJSON validity
         *  */
        // https://chromium.googlesource.com/chromium/src/+/master/content/browser/webauth/client_data_json.md
        // make new variable collected_client_data to concat data on client_data_json
        // decode base64url from client to string
        $clientdata_json = Base64Url::decode($clientdata_json);
        $clientdata_json = json_decode($clientdata_json);

        // check challenge that RP send on register page, if exist on database it mean challenge is valid
        $is_challenge_exist = Random::where('challenge', $clientdata_json->challenge)->first();
        if (!$is_challenge_exist) {
            return response()->json([
                'status' => 'fail',
                'message' => "challenge is not exist on database"
            ]);
        } else {
            // now time is greater than timeout time challenge, it mean challenge has been expired
            if (time() > strtotime($is_challenge_exist->timeout)) {
                return response()->json([
                    'status' => 'fail',
                    'message' => "challenge expired"
                ]);
            }
        }

        // Get Authdata
        $attestation_auth_data = CryptoAuth::parseAuthData($attestation_object);

        $newPublicKey = new PublicKey;
        $newPublicKey->type = $attestation_auth_data['COSEPublicKey']['type'];
        $newPublicKey->type_scheme = $attestation_auth_data['COSEPublicKey']['scheme'];
        $newPublicKey->hash_name = $attestation_auth_data['COSEPublicKey']['hash'];
        $newPublicKey->key = $attestation_auth_data['COSEPublicKey']['key'];
        $newPublicKey->counter = $attestation_auth_data['counter'];
        $newPublicKey->save();



        // Save data to database
        $newuSER                = new USER;
        $newuSER->credential_id = $credential_id;
        $newuSER->email         = $email;
        $newuSER->name          = $name;
        $newuSER->user_id       = $is_challenge_exist->user_id;
        $newuSER->publickey_id = $newPublicKey->id;
        $newuSER->save();


        return response()->json([
            "message" => "Success tedisogun from server"
        ]);
    }


    public function login_qr_getpage()
    {

        //  random bytes binary. 32 bytes = 256bit
        // convert challenge to base64url
        $random_challenge = Base64Url::encode(random_bytes(32));
        $random_qrcode = Base64Url::encode(random_bytes(32));

        // Save random to database
        $random = new Random;
        $random->challenge = $random_challenge;
        $random->qr = $random_qrcode;
        $random->type = 'login';
        $random->timeout = now()->addMinutes(60) ;
        $random->save();

        return view('sso_login', [
            'qr_code' => $random->challenge
        ]);
    }

    public function login_qr_response(Request $req)
    {
        // first check if all 3 value exist
        if(! $req->has(['qr_code', 'email', 'credential_id']) ) return response()->json([
            'status' => 'fail',
            'message' => "Not Enough Parameter data"
        ]);

        $isEmailCredentialExist = User::where('email', $req->email)->where('credential_id', $req->credential_id)->first();
        if(! $isEmailCredentialExist) return response()->json([
            'status' => 'fail',
            'message' => "Email or Credential is unknown"
        ]);

        $getChallenge = Random::where('qr', $req->qr_code)->first();

        if(! $getChallenge) return response()->json([
            'status' => 'fail',
            'message' => "Qr Code wrong unkown"
        ]);

        return response()->json([
            "challenge" => $getChallenge->challenge,
            "credential_id" =>$isEmailCredentialExist->credential_id,
            "rp_id" => "testfido.com"
        ]);

    }



    public function login(Request $req)
    {
        if(! $req->has(['email','credential_id', 'clientdata_json', 'authenticator_object', 'signature']) ) return response()->json([
            'status' => 'fail',
            'message' => "Not Enough Parameter data"
        ]);

        $user = User::where('email', $req->email)->where('credential_id', $req->credential_id)->first();

        if(! $user)return response()->json([
            'status' => 'fail',
            'message' => "email or credential is not on database"
        ]);

        // get for counter ++
        $assertion_obj = CryptoAuth::parseAuthAssertion($req->authenticator_object);

        $publickey = PublicKey::where('id', $user->publickey_id)->first();
        $isSignatureValid = CryptoAuth::verifyAssertion($publickey, $req->clientdata_json, $req->authenticator_object, $req->signature);

        if($isSignatureValid){
            $publickey->counter = $assertion_obj['counter'];
            $publickey->save();
            $clientdata_json = json_decode(Base64Url::decode($req->clientdata_json));
            $random = Random::where('challenge', $clientdata_json->challenge)->first();

            $session = new Session;
            $session->random_id = $random->id;
            $session->user_id = $user->id;
            $session->clientdata_json_base64url = $req->clientdata_json;
            $session->authenticator_obj_base64url = $req->authenticator_object;
            $session->signature_base64url = $req->signature;
            $session->session_base64url = Base64Url::encode(random_bytes(32));
            $session->save();

            return response()->json([
                'status' => 'Sukses',
                'message' => "Berhasil Login dengan QR",
                'counter' => $assertion_obj['counter']
            ]);
        }else{
            return response()->json([
                'status' => 'Fail',
                'message' => "Signature is Invalid"
            ]);
        }





    }


    public function is_challenge_already_login(Request $req)
    {
        $random = Random::where('challenge', $req->qr_code )->first();
        $session = Session::where('random_id', $random->id )->first();

        if($session){
            return response()->json([
                'is_succes' => true,
                "session_base64url" => $session->session_base64url
            ]);
        }else{
            return response()->json([
                'is_succes' => false,
            ]);
        }
    }

    public function welcome(Request $req)
    {
        $session = Session::where('session_base64url', $req->session_base64url)->first();
        if($session){
            return response()->json([
                'status' => 'sukses login',
            ]);
        }else{
            return response()->json([
                'status' => 'Session not exist',
            ]);
        }
    }


}
