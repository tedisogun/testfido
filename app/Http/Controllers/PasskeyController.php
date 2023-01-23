<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Random;
use Base64Url\Base64Url;

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


    public function getSSOLoginPage()
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

        return view('passkey/sso_login', [
            'challenge' => $random->challenge
        ]);
    }

}
