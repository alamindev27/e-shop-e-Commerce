<?php

namespace App\Http\Controllers;

use App\Mail\PasswordUpdateMail;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role != 3)
        {
            return view('home');
        }
        return redirect('/');
    }


    public function profile()
    {
        return view('backend.auth.profile',[
            'profile' => User::where('id', auth()->id())->first(),
            'address' => Vendor::where('user_id', auth()->id())->first()
        ]);
    }

    public function profileupdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required | numeric',
            'profile' => 'image'
        ]);
        if($request->hasFile('profile'))
        {
            if(Auth::user()->profile != 'default-profile.png')
            {
                unlink(base_path('public/uploads/profile/'.Auth::user()->profile));
            }
            $profile_image = auth()->id().Str::random(5).'-user-profile-photo'.'.'.$request->file('profile')->getClientOriginalExtension();
            Image::make($request->file('profile'))->resize(100, 100)->save(base_path('public/uploads/profile/'.$profile_image));
            User::find(auth()->id())->update([
                'profile' => $profile_image,
            ]);
        }
        User::find(auth()->id())->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        if($request->address)
        {
            Vendor::where('user_id', auth()->id())->update([
                'vendor_address' => $request->address
            ]);
        }
        return back()->with('profileSuccess', 'Profile Update Successfull');
    }

    public function passwordupdate(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required | min:8 | max:60',
            'new_password' => 'required | min:8 | max:60',
            'confirm_password' => 'required | min:8 | max:60',
        ]);

        if(Hash::check($request->old_password, Auth::user()->password))
        {
            if($request->new_password == $request->confirm_password)
            {
                User::find(auth()->id())->update([
                    'password' => Hash::make($request->new_password)
                ]);
                $name = auth()->user()->name;
                return back()->with('passwordSuccess', 'Password Update Successfull');
            }
            else
            {
                return back()->with('confirm_password', 'New password and Confirm password not match');
            }
        }
        else
        {
            return back()->with('old_password', 'Old password not match');
        }
    }



}
