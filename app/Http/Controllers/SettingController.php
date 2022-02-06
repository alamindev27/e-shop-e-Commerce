<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function index()
    {
        return view('backend.settings.setting', [
            'datas' => Setting::all()
        ]);
    }

    public function updateHeaderLogo(Request $request, $id)
    {
        $oldImg = Setting::where('id', Crypt::decrypt($id))->first()->header_logo;
        $request->validate([
            'header_logo' => 'image'
        ]);
        if($request->hasFile('header_logo'))
        {
            if($oldImg != 'logo-top.png')
            {
                unlink(base_path('public/uploads/logo/'.$oldImg));
            }
        }
        $imgName = 'header-logo.'.$request->file('header_logo')->getClientOriginalExtension();
        Image::make($request->file('header_logo'))->resize(110,32)->save(base_path('public/uploads/logo/'.$imgName));
        Setting::where('id', Crypt::decrypt($id))->update([
            'header_logo' => $imgName
        ]);
        return back()->with('success', 'Header logo update successfull');
    }
    public function updateFooterLogo(Request $request, $id)
    {
        $oldImg = Setting::where('id', Crypt::decrypt($id))->first()->footer_logo;
        $request->validate([
            'footer_logo' => 'image'
        ]);
        if($request->hasFile('footer_logo'))
        {
            if($oldImg != 'logo-footer.png')
            {
                unlink(base_path('public/uploads/logo/'.$oldImg));
            }
        }
        $imgName = 'footer-logo.'.$request->file('footer_logo')->getClientOriginalExtension();
        Image::make($request->file('footer_logo'))->resize(110,32)->save(base_path('public/uploads/logo/'.$imgName));
        Setting::where('id', Crypt::decrypt($id))->update([
            'footer_logo' => $imgName
        ]);
        return back()->with('success', 'Footer logo update successfull');
    }
    public function favicon(Request $request, $id)
    {
        $oldImg = Setting::where('id', Crypt::decrypt($id))->first()->favicon;
        $request->validate([
            'favicon' => 'image'
        ]);
        if($request->hasFile('favicon'))
        {
            if($oldImg != 'favicon.png')
            {
                unlink(base_path('public/uploads/logo/'.$oldImg));
            }
        }
        $imgName = 'favicon-update.'.$request->file('favicon')->getClientOriginalExtension();
        Image::make($request->file('favicon'))->resize(32,32)->save(base_path('public/uploads/logo/'.$imgName));
        Setting::where('id', Crypt::decrypt($id))->update([
            'favicon' => $imgName
        ]);
        return back()->with('success', 'Favicon update successfull');
    }
    public function topheader(Request $request, $id)
    {
        $request->validate([
            '*' => 'required',
            'email' => 'email'
        ]);
        Setting::where('id', Crypt::decrypt($id))->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'store_location' => $request->store
        ]);
        return back()->with('success', 'Top header update successfull');
    }
    public function footerinfochange(Request $request, $id)
    {
        $request->validate([
            '*' => 'required',
            'info_email' => 'email',
            'info_number' => 'min:8 | max: 15',
        ]);

        Setting::where('id', Crypt::decrypt($id))->update([
            'office_location' => $request->office_location,
            'country' => $request->country,
            'city' => $request->city,
            'info_email' => $request->info_email,
            'info_number' => $request->info_number,
            'footer_description' => $request->footer_description,
            'copyright_text' => $request->copyright_text,
            'copyright_link' => $request->copyright_link
        ]);
        return back()->with('success', 'Footer info update successfull');
    }

}
