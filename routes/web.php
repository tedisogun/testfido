<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FIDOController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/login-qr', [FIDOController::class, 'login_qr_response']);
Route::post('/login', [FIDOController::class, 'login']);
Route::get('/register', [FIDOController::class, 'registerRequest']);
Route::post('/register', [FIDOController::class, 'registerResponse']);

Route::get('/login-qr', [FIDOController::class, 'login_qr_getpage']);
Route::get('/check-challenge-already-login', [FIDOController::class, 'is_challenge_already_login']);
Route::get('/welcome', [FIDOController::class, 'welcome']);

Route::get('/phpinfo', function(){
    return view('phpinfo');
});

Route::get('/sso', function(){
    return view('sso_login');
});
