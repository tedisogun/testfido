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
        if(! $req->has(['name', 'email', 'credential_id', 'attestation_object', 'client_data_json']) ) return response()->json([
            'status' => 'fail',
            'message' => "some input is missing"
        ]);

        /**
         * put POST data to variable
         */
        $credential_id = $req->credential_id;
        $client_data_json = $req->client_data_json;
        $attestation_object = $req->attestation_object;
        $email = $req->email;
        $name = $req->name;

        // check if email has been register before
        $isNewEmail = User::where('email', $email)->first();
        if($isNewEmail) return response()->json([
            'status' => 'fail',
            'message' => "Email has been use for register before"
        ]);

        /**
         * Check clientDataJSON validity
         *  */ 

        // decode base64 from client to string
        $client_data_json = base64_decode($client_data_json);
        // decode string to json object php
        $client_data_json = json_decode($client_data_json);

    
        // check challenge that RP send on register page, if exist on database it mean challenge is valid
        $is_challenge_exist = Random::where('challenge', $client_data_json->challenge)->first();
        if(! $is_challenge_exist )
        {
            return response()->json([
                'status' => 'fail',
                'message' => "challenge is not exist on database"
            ]);
        }else{
            // now time is greater than timeout time challenge, it mean challenge has been expired
            if(time() > strtotime($is_challenge_exist->timeout)){
                return response()->json([
                    'status' => 'fail',
                    'message' => "challenge expired"
                ]);
            }
        }
        
        // https://chromium.googlesource.com/chromium/src/+/master/content/browser/webauth/client_data_json.md
        // make new variable collected_client_data to concat data on client_data_json

        $collectedclientdata = new StdClass();
        $collectedclientdata->type = $client_data_json->type;
        $collectedclientdata->challenge = $client_data_json->challenge;
        $collectedclientdata->origin = $client_data_json->origin;
        $collectedclientdata->crossOrigin = $client_data_json->crossOrigin;
        // collectedClientData as string json, use for verifying attestation
        $collectedclientdata = json_encode($collectedclientdata, JSON_UNESCAPED_SLASHES);

        

        // Save data to database
        $newuSER = new USER;
        $newuSER->credential_id = $credential_id;
        $newuSER->email = $email;
        $newuSER->name = $name;
        $newuSER->save();

        // Response success to client
        return response()->json([
            'status' => 'success',
            'id' => $newuSER->credential_id,
        ]);



    }


}
