<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('register');
    }

    public function register(Request $req)
    {

    }


}
