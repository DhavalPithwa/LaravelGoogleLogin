<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;
use Exception;
use Cache;

class googleauthct extends Controller
{
    public function providers()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callBack()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $existsUser = User::where('email', $user->email)->first();
        try {
            if ($existsUser) {
                Auth::loginUsingId($existsUser->id);
            } else {
                $u = new User;
                $u->name = $user->name;
                $u->email = $user->email;
                $u->google_id = $user->id;
                $u->password = md5(rand(1, 10000));
                $u->save();
                Auth::loginUsingId($u->id);
            }
            return redirect()->to('/');
        } catch (Exception $e) {
             echo $e;
        }
    }
    public function logout()
    {
        Auth::logout();
        Cache::flush();
        return redirect()->to('/profile');
    }

    public function profile()
    {
        $user = Auth::user();

        //echo $user;
        if (!$user) {
            return redirect()->to('/');
        } else {
            return view('profile', ['user' => $user]);
        }
    }
}
