<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FIDOController;
use App\Http\Controllers\PasskeyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//// Request & Response Register
//Route::get('/register', [FIDOController::class, 'registerRequest']);
//Route::post('/register', [FIDOController::class, 'registerResponse']);
//
//// Getting QR code & Sign response
//Route::get('/login-qr', [FIDOController::class, 'login_qr_getpage']);
//Route::post('/login', [FIDOController::class, 'login']);
//Route::get('/check-challenge-already-login', [FIDOController::class, 'is_challenge_already_login']);
//
//// Succes page after user successfuly sign with fido2
//Route::get('/success', [FIDOController::class, 'success']);


// Using Passkey Instead of FIDO2
Route::get('/login', [PasskeyController::class, 'getSSOLoginPage']);
Route::post('/login-password', [PasskeyController::class, 'loginPassword']);
Route::post('/login-passkey', [PasskeyController::class, 'loginPasskey']);
Route::get('/logout', [PasskeyController::class, 'logout']);
Route::get('/home', [PasskeyController::class, 'getSSOHomePage']);



/*
 *
 * Unused Routes


Route::get('/', function () {
    return view('welcome');
});


Route::post('/login-qr', [FIDOController::class, 'login_qr_response']);

Route::get('/phpinfo', function(){
    return view('unused/phpinfo');
});

Route::get('/sso', function(){
    return view('sso_login');
});

*/
