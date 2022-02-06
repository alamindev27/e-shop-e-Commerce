<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function index()
    {
        return view('backend.banner.index', [
            'data' => Banner::all()
        ]);
    }
    public function edit($id)
    {
        return view('backend.banner.edit', [
            'data' => Banner::where('id', Crypt::decrypt($id))->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $obimgname = Banner::where('id', Crypt::decrypt($id))->first()->banner_image;
        $request->validate([
            'offer_text' => 'required',
            'banner_heading' => 'required',
            'sort_description' => 'required | max:150',
            'banner_image' => 'image',
        ]);

        if($request->hasFile('banner_image'))
        {
            if($obimgname != 'default-banner-image.png')
            {
                unlink(base_path('public/uploads/banner/'.$obimgname));
            }
            $imgName = 'update-banner-image.'.$request->file('banner_image')->getClientOriginalExtension();
            Image::make($request->file('banner_image'))->resize(1900, 700)->save(base_path('public/uploads/banner/'.$imgName));
            Banner::where('id', Crypt::decrypt($id))->update([
                'banner_image' => $imgName
            ]);
        }
        Banner::find(Crypt::decrypt($id))->update([
            'offer_text' => $request->offer_text,
            'banner_heading' => $request->banner_heading,
            'sort_description' => $request->sort_description,
        ]);
        return redirect('banner')->with('success', 'Banner update successfull');
    }
}
