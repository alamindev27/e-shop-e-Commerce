<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class GithubController extends Controller
{
    public function githubredirect()
    {
        return Socialite::driver('github')->redirect();
    }
    public function githubcallback()
    {
        $user = Socialite::driver('github')->user();
        // $genarated_password = Str::random(8);

        if(User::where('email', $user->getEmail())->first())
        {
            // Auth::login($user);
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
