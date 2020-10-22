<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('login/{socialNetwork}', [App\Http\Controllers\SocialLoginController::class, 'redirectToSocialNetwork'])->name('login.social');
Route::get('login/{socialNetwork}/callback', [App\Http\Controllers\SocialLoginController::class, 'handleSocialNetworkCallback']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
