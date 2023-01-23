<?php

namespace App\Http\Controllers;
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
        $credentials = Credential::where('users_id', $user->id)->get(['name']);

        //  random bytes binary. 32 bytes = 256bit
        // convert challenge to base64url
        $passkeySession = new PasskeySession;
        $passkeySession->random_challenge = Base64Url::encode(random_bytes(32));
        $passkeySession->timeout = now()->addMinutes(60) ;
        $passkeySession->credentials_users_id = $user->id;
        $passkeySession->save();

        return response()->json([
            'user' => $user,
            'challenge' => $passkeySession->random_challenge,
            'credentials' => $credentials
            ], 200);

    }

}
