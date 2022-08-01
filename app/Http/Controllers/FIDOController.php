<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Random;
class FIDOController extends Controller
{
    public function loginpage()
    {
        return view('login');
    }

    public function login(Request $req)
    {

    }

    public function registerpage()
    {
        // use bin2hex function to convert random bytes binary. 32 bytes = 256bit
        $random_challenge = bin2hex(random_bytes(32));
        while(true)
        {
            /* check random userid, if generated random already exist in database
                make new random and do it until generated random has no equal in database
            */
            $random_userid = bin2hex(random_bytes(32));
            $check_userid = User::where('user_id', $random_userid)->first();
            // break loop-while when newly generated random userid has no equal in database user
            if(!$check_userid) break;
        }

        // Save random to database
        $random = new Random;
        $random->challenge = $random_challenge;
        $random->user_id = $random_userid;
        $random->type = 'register';
        $random->timeout = now()->addMinutes(60) ;
        $random->status = 'active';
        $random->save();

        return view('register', [
            'user_id' => $random_userid,
            'challenge' => $random_challenge
        ]);
    }

    public function register(Request $req)
    {
        // first check if all 3 value exist
        if(! $req->has(['name', 'email', 'credential_id']) ) return response()->json([
            'status' => 'fail',
            'message' => "some input is missing"
        ]);

        $credential_id = $req->credential_id;
        $email = $req->email;
        $name = $req->name;

        // check if email has been register before
        $isNewEmail = User::where('email', $email)->first();
        if($isNewEmail) return response()->json([
            'status' => 'fail',
            'message' => "Email has been use for register before"
        ]);


        $newuSER = new USER;
        $newuSER->credential_id = $credential_id;
        $newuSER->email = $email;
        $newuSER->name = $name;
        $newuSER->save();

        return response()->json([
            'status' => 'success',
            'id' => $newuSER->credential_id,
        ]);



    }


}
