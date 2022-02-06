<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    public function index()
    {
        if(isset($_GET['coupon']))
        {
            if($_GET['coupon'])
            {
                $coupon = $_GET['coupon'];
                if(Coupon::where('coupon_name', $coupon)->exists())
                {
                    $coupon_info = Coupon::where('coupon_name', $coupon)->first();
                    if($coupon_info->limit != 0 )
                    {
                        if(Carbon::today()->format('Y-m-d') > $coupon_info->vilidity)
                        {
                            $discount = 0;
                            return redirect('cart')->with('couponError', $coupon.' This Coupon Validity is Over.');
                        }
                        else
                        {
                            $discount = (session('s_cart_total') * $coupon_info->discount) / 100;
                        }
                    }
                    else
                    {
                        $discount = 0;
                        return redirect('cart')->with('couponError', $coupon.' This Coupon Limit is Over.');
                    }
                }
                else
                {
                    $discount = 0;
                    return redirect('cart')->with('couponError', $coupon.' Coupon Not Available');
                }
            }
            else
            {
                $coupon = '';
                $discount = 0;
            }
        }
        else
        {
            $coupon = '';
            $discount = 0;
        }
        return view('frontend.cart.index',[
            'carts' => Cart::where('customer_id', auth()->id())->get(),
            'discount' => $discount,
            'coupon' => $coupon
        ]);
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required | min:1 | max:1000',
        ]);

        if(Product::find(Crypt::decrypt($id))->stock < $request->quantity)
        {
            return back()->with('error', 'Stock limit over');
        }
        else
        {
            if(Cart::where('customer_id', auth()->id())->where('product_id', Crypt::decrypt($id))->exists())
            {
                Cart::where('customer_id', auth()->id())->where('product_id', Crypt::decrypt($id))->increment('quantity', $request->quantity);
            }
            else
            {
                Cart::insert([
                    'customer_id' => auth()->id(),
                    'product_id' => Crypt::decrypt($id),
                    'color_id' => $request->color_id,
                    'size_id' => $request->size_id,
                    'quantity' => $request->quantity,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        return back()->with('successCart', 'Added Successfull');
    }






    public function insert(Request $request, $slug)
    {
        if(Product::find(Product::where('slug', $slug)->first()->id)->stock < 1)
        {
            return back()->with('errorStock', 'Stock over');
        }
        else
        {
            if(Cart::where('customer_id', auth()->id())->where('product_id', Product::where('slug', $slug)->first()->id)->exists())
            {
                Cart::where('customer_id', auth()->id())->where('product_id', Product::where('slug', $slug)->first()->id)->increment('quantity', 1);
            }
            else
            {

                if(ProductColor::where('product_id', Product::where('slug', $slug)->first()->id)->exists())
                {
                    $color = ProductColor::where('product_id', Product::where('slug', $slug)->first()->id)->first()->color_id;
                }
                else
                {
                    $color = '';
                }

                if(ProductSize::where('product_id', Product::where('slug', $slug)->first()->id)->exists())
                {
                    $size = ProductSize::where('product_id', Product::where('slug', $slug)->first()->id)->first()->size_id;
                }
                else
                {
                    $size = '';
                }

                Cart::insert([
                    'customer_id' => auth()->id(),
                    'product_id' => Product::where('slug', $slug)->first()->id,
                    'color_id' => $color,
                    'size_id' => $size,
                    'quantity' => 1,
                    // 'created_at' => Carbon::now()
                ]);
            }
        }
        if(Wishlist::where('customer_id', auth()->id())->where('product_id', Product::where('slug', $slug)->first()->id)->exists())
        {
            Wishlist::where('customer_id', auth()->id())->where('product_id', Product::where('slug', $slug)->first()->id)->delete();
        }
        return back()->with('success', 'Add Successfull');
    }

    public function remove($id)
    {
        Cart::where('customer_id', auth()->id())->where('product_id', Crypt::decrypt($id))->delete();
        return back()->with('success', 'A product removed from Cart');
    }
    public function updateCart(Request $request)
    {
        foreach($request->quantity as $cart_id => $updated_quantity)
        {
            if (Product::find(Cart::find($cart_id)->product_id)->stock < $updated_quantity) {
                return back()->with('stockError', 'Stock not abaleable');
            }
            Cart::find($cart_id)->update([
                'quantity' => $updated_quantity,
            ]);
        }
        return back()->with('update', 'Cart update successfull.');
    }

















}
