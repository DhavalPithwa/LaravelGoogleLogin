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
    $user = Auth::user();
    return view('welcome', ["user" => $user]);
});
Route::get('/google_login', 'googleauthct@providers');
Route::get('/callback/google', 'googleauthct@callBack');
Route::get('/logout', 'googleauthct@logout');
Route::get('/profile', 'googleauthct@profile');
Route::get('/user', function () {
    return Auth::user();
});
