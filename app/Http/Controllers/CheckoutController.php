<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class CheckoutController extends Controller
{
    public function index()
    {
        if(strpos(url()->previous(), 'cart'))
        {
            return view('frontend.checkout.checkout', [
                'countries' =>Country:: where('status', 2)->get()
            ]);
        }
        else{
            abort(404);
        }
    }




    // public function checkoutSubmit(Request $request)
    // {
    //     $request->validate([
    //         'fname' => 'required',
    //         'lname' => 'required',
    //         'email' => 'required | email',
    //         'phone' => 'required',
    //         'country' => 'required',
    //         'city_id' => 'required',
    //         'address' => 'required',
    //         'postcode' => 'required',
    //         'payment' => 'required',
    //     ]);
    //     $payment = Crypt::decrypt($request->payment);
    // }
}
