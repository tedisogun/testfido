<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Session;
use App\Models\PasskeySession;
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
        $cookieSession = $req->cookie->get('castgc');

        if($cookieSession ){
            $cookieSession = Session::where('castgc', $cookieSession )->first();
            if( $cookieSession && $cookieSession->status == "active") return redirect('/home');
        }

        return $cookieSession;

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
        $cookieSession = $req->cookie('castgc');
        if(!$cookieSession) return redirect('/login');

        $cookieSession = Session::where('castgc',$cookieSession )->first();

        if(!$cookieSession) return redirect('/login');

        if($cookieSession->status == "expired") return redirect('/login');

        $user = User::where('id', $cookieSession->users_id)->first();

        return view('passkey/sso_home', [
           'user' => $user,
        ]);
    }

}
