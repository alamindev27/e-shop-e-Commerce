<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WishlistController extends Controller
{
    public function index()
    {
        return view('frontend.wishlist.index', [
            'allWishlists' => Wishlist::where('customer_id', auth()->id())->get(),
        ]);
    }
    public function store($id)
    {
        Wishlist::insert([
            'customer_id' => auth()->id(),
            'product_id' => Crypt::decrypt($id),
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Successfully added to wishlist');
    }
    public function remove($id)
    {
        Wishlist::where('customer_id', auth()->id())->where('product_id', Crypt::decrypt($id))->delete();
        return back()->with('success', 'A product removed from wishlist');
    }
}
