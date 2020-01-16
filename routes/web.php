<?php

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
Route::get('/google_login', 'googleauthct@providers');
Route::get('/callback/google', 'googleauthct@callBack');
Route::get('/home', function () {
    echo "success";
});
Route::get('/logout', function () {
    Auth::logout();
    return view('welcome');
});
Route::get('/profile', function () {
    return Auth::user();
});
