<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function googleredirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googlecallback()
    {
        $user = Socialite::driver('google')->user();
        if(User::where('email', $user->getEmail())->first())
        {
            Auth::attempt([
                'email' => $user->getEmail(),
                'password' => 'klsdf*(^654jkd'
            ]);
            return redirect('/home');
        }
        else
        {
            $login_info = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt('klsdf*(^654jkd')
            ]);
            Auth::login($login_info);
            return redirect('/home');
        }

    }
}
