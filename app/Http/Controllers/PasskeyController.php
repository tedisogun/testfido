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
}
