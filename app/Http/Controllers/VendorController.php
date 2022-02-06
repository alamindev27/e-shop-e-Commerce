<?php

namespace App\Http\Controllers;

use App\Mail\VendorMail;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('backend.vendor.index', [
        'data' => User::where('role', 2)->get()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vendor_name' => 'required',
            'vendor_email' => 'required | email',
            'vendor_phone' => 'required | numeric | min:8',
            'vendor_address' => 'required',
        ]);

        $vendorPassword = Str::random(8);
        $user_id = User::insertGetId([
            'name' => $request->vendor_name,
            'email' => $request->vendor_email,
            'phone' => $request->vendor_phone,
            'password' => Hash::make($vendorPassword),
            'role' => 2,
            'created_at' => Carbon::now()
        ]);

        Vendor::insert([
            'user_id' => $user_id,
            'vendor_address' => $request->vendor_address,
            'created_at' => Carbon::now()
        ]);
        Mail::to($request->vendor_email)->send(new VendorMail($request->vendor_name, $request->vendor_email, $vendorPassword));
        return back()->with('vendorSuccess', 'Vendor Added Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.vendor.show', [
            'data' => User::where('id', Crypt::decrypt($id))->first(),
            'address'=> Vendor::where('user_id', Crypt::decrypt($id))->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find(Crypt::decrypt($id))->profile != 'default-profile.png')
        {
            unlink(base_path('public/uploads/profile/'.User::find(Crypt::decrypt($id))->profile));
        }
        User::find(Crypt::decrypt($id))->delete();
        Vendor::where('user_id', Crypt::decrypt($id))->delete();
        return back()->with('vendorSuccess', 'A Vendor Deleted Successfull');
    }
}
