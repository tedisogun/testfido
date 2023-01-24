<?php

namespace App\Http\Controllers;
use App\Helpers\CryptoAuth;
use App\Models\PublicKey;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Session;
use App\Models\PasskeySession;
use App\Models\Credential;
use Base64Url\Base64Url;
use Carbon\Carbon;

class PasskeyController extends Controller
{
    public function authLanding(){
        $random_challenge = Base64Url::encode(random_bytes(32));
        $random_userid = Base64Url::encode(random_bytes(32));

        return view('passkey/authlanding', [
            'random_challenge' => $random_challenge,
            'random_userid' => $random_userid
        ]);
    }


    public function getSSOLoginPage(Request $req)
    {
        $cookieSession = isset($_COOKIE['castgc']) ? $_COOKIE['castgc'] : null;
        if($cookieSession ){
            $cookieSession = Session::where('castgc', $cookieSession )->first();
            if( $cookieSession && $cookieSession->status == "active") return redirect('/home');
        }



        //  random bytes binary. 32 bytes = 256bit
        // convert challenge to base64url
        $random_challenge = Base64Url::encode(random_bytes(32));

        // Save random to database
        $passkey = new PasskeySession;
        $passkey->random_challenge = $random_challenge;
        $passkey->timeout = now()->addMinutes(60) ;
        $passkey->save();

        return view('passkey/sso_login', [
            'challenge' => $passkey->random_challenge
        ]);
    }

    public function loginPassword(Request $req){


        $user = User::where('email', $req->email)->first();

        if($user){
            $randomSession = Base64Url::encode(random_bytes(64));
            $session = new Session;
            $session->castgc = $randomSession;
            $session->timeout = Carbon::now()->addDay(2);
            $session->status = "active";
            $session->created_at = Carbon::now();
            $session->users_id = $user->id;
            $session->save();

            return response()->json([
                'status' => 'success',
                'castgc' => $session->castgc,
            ], 200);
        }

        return response()->json([
            'status' => 'fail',
        ], 403);

    }

    public function loginPasskey(Request $req){
        if(! $req->has(['credential_id', 'clientdata_json', 'authenticator_object', 'signature']) ) return response()->json([
            'status' => 'Post Parameter not Enough',
            'message' => "Not Enough Parameter data"
        ], 403);

        $credential = Credential::where('credential', $req->credential_id)->first();
        if(!$credential){
            return response()->json([
                'status' => 'credential not exist',
                'message' => "Credential not exist"
            ], 403);
        }



        // get for counter ++
        $assertion_obj = CryptoAuth::parseAuthAssertion($req->authenticator_object);

        // Get public key of credential that user use to login
        $publickey = PublicKey::where('id', $credential->public_key_id)->first();
        // validate the signature with credential
        $isSignatureValid = CryptoAuth::verifyAssertion($publickey, $req->clientdata_json, $req->authenticator_object, $req->signature);

        // if signature is invalid
        if(! $isSignatureValid)
        {
            return response()->json([
                'status' => 'Signature Invalid',
                'message' => "Signature is Invalid"
            ], 403);
        }

            // Save counter to public key
            $publickey->counter = $assertion_obj['counter'];
            $publickey->save();

            // Save PasskeySession login activity with its data
            $clientdata_json = json_decode(Base64Url::decode($req->clientdata_json));
            $passkeySession = PasskeySession::where('random_challenge', Base64Url::decode($clientdata_json->challenge))->first();
            $passkeySession->clientdata_json_base64url = $req->clientdata_json;
            $passkeySession->authenticator_obj_base64url = $req->authenticator_object;
            $passkeySession->signature_base64url = $req->signature;
            $passkeySession->credentials_id = $credential->id;
            $passkeySession->credentials_users_id = $credential->users_id;
            $passkeySession->credentials_public_key_id = $credential->public_key_id;
            $passkeySession->save();

            // Create new login session for user

        // get the user
        $user = User::where('id', $credential->users_id)->first();
        //Create random String for user, make sure it is unique & if not, it will make a new

        do{
            // while will stop if the session is not yet exist in database;
            $randomSession = Base64Url::encode(random_bytes(64));
            $session = Session::where('castgc', $randomSession)->first();
        }while($session);


        $session = new Session;
        $session->castgc = $randomSession;
        $session->timeout = Carbon::now()->addDay(2);
        $session->status = "active";
        $session->created_at = Carbon::now();
        $session->users_id = $user->id;
        $session->save();

        return response()->json([
            'status' => 'success',
            'castgc' => $session->castgc,
        ], 200);


    }

    public function getSSOHomePage(Request $req){
        $cookieSession = isset($_COOKIE['castgc']) ? $_COOKIE['castgc'] : null;
        if(!$cookieSession) return redirect('/login');

        $cookieSession = Session::where('castgc',$cookieSession )->first();

        if(!$cookieSession) return redirect('/login');

        if($cookieSession->status == "expired") return redirect('/login');

        $user = User::where('id', $cookieSession->users_id)->first();

        return view('passkey/sso_home', [
           'user' => $user,
        ]);
    }

    public function logout()
    {
        $cookieSession = isset($_COOKIE['castgc']) ? $_COOKIE['castgc'] : null;

        if($cookieSession == null ) return redirect('/login');
        $cookieSession = Session::where('castgc',$cookieSession )->first();
        $cookieSession->status = "expired";
        $cookieSession->save();
        return redirect('/login');
    }

    public function registerPasskeyData()
    {
        $cookieSession = isset($_COOKIE['castgc']) ? $_COOKIE['castgc'] : null;

        if(!$cookieSession) return response()->json(['message' => 'Fail, No Cookie'], 403);

        $cookieSession = Session::where('castgc',$cookieSession )->first();

        if(!$cookieSession) return response()->json(['message' => 'Fail, Invalid Cookie'], 403);

        if($cookieSession->status == "expired") return response()->json(['message' => 'Fail, Cookie Expired'], 403);

        // Get user data that want to register passkey
        $user = User::where('id', $cookieSession->users_id)->first(['id', 'email', 'name']);

        // Get User available credential if there is any
        $credentials = Credential::where('users_id', $user->id)->get(['credential']);

        //  random bytes binary. 32 bytes = 256bit
        // convert challenge to base64url
        $passkeySession = new PasskeySession;
        $passkeySession->random_challenge = Base64Url::encode(random_bytes(32));
        $passkeySession->timeout = now()->addMinutes(60) ;
        $passkeySession->credentials_users_id = $user->id;
        $passkeySession->save();

        // Unset ID, user dont need to know about this
        unset($user['id']);

        return response()->json([
            'user' => $user,
            'challenge' => $passkeySession->random_challenge,
            'credentials' => $credentials
            ], 200);

    }

    public function registerPasskeyCredential(Request $req)
    {

        // first check if all 3 value exist
        if (!$req->has(['credential_id', 'attestation_object', 'clientdata_json']))
            return response()->json([
                'status' => 'Post parameter not enoguh, input missing',
                'message' => "some input is missing"], 403);

        /**
         * put POST data to variable
         */
        // credential_id is in baseu4l text format
        $credential_id      = $req->credential_id;
        $clientdata_json    = $req->clientdata_json;
        $attestation_object = $req->attestation_object;

        // get Cookie, get user
        $cookieSession = isset($_COOKIE['castgc']) ? $_COOKIE['castgc'] : null;
        $cookieSession = Session::where('castgc',$cookieSession )->first();
        $user = User::where('id', $cookieSession->users_id)->first(['id', 'email', 'name']);

        /**
         * Check clientDataJSON validity
         *  */
        // https://chromium.googlesource.com/chromium/src/+/master/content/browser/webauth/client_data_json.md
        // make new variable collected_client_data to concat data on client_data_json
        // decode base64url from client to string
        $clientdata_json = Base64Url::decode($clientdata_json);
        $clientdata_json = json_decode($clientdata_json);

        // check challenge that RP send on register page, if exist on database it mean challenge is valid
        $is_challenge_exist = PasskeySession::where('random_challenge', Base64Url::decode($clientdata_json->challenge))->first();
        if (!$is_challenge_exist) {
            return response()->json([
                'status' => 'challenge is Invalid',
                'message' => "challenge is not exist on database"
            ], 403);
        } else {
            // now time is greater than timeout time challenge, it mean challenge has been expired
            if (time() > strtotime($is_challenge_exist->timeout)) {
                return response()->json([
                    'status' => 'Challenge Expired, Try Again',
                    'message' => "challenge expired"
                ], 403);
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
        $newCredential = new Credential;
        $newCredential->credential = $credential_id;
        $newCredential->device_type = "tes-device-xxx";
        $newCredential->created_at = Carbon::now();;
        $newCredential->users_id = $user->id;
        $newCredential->public_key_id = $newPublicKey->id;
        $newCredential->save();



        return response()->json([
            "message" => "Success tedisogun from server",
            "newCredential" => $newCredential,
            "publickey" => $newPublicKey
        ], 200);

    }

}
