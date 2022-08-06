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

Route::get('/login', [FIDOController::class, 'loginpage']);
Route::post('/login', [FIDOController::class, 'login']);
Route::get('/register', [FIDOController::class, 'registerRequest']);
Route::post('/register', [FIDOController::class, 'registerResponse']);

Route::get('/phpinfo', function(){
    return view('phpinfo');
});
