<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductThumbnail;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FrontendController extends Controller
{
    public function index()
    {

        return view('welcome', [
            'banners' => Banner::all(),
            'categories' => Category::limit(6)->get(),
            'allcategories' => Category::all(),
            'hotItem' => Product::latest()->limit(10)->get(),

        ]);
    }


    public function categorywasproduct($cid)
    {
        $id = Crypt::decrypt($cid);
        return view('frontend.product.categorywaysproduct', [
            'categoryProduct' => Product::where('category_id', $id)->get(),
            'categoryName' => Category::where('id', $id)->first()->category_name
        ]);
    }


    public function productDetails($slug)
    {
        if (Wishlist::where('customer_id', auth()->id())->where('product_id', Product::where('slug', $slug)->first()->id)->exists())
        {
            $wishlistStatus = Wishlist::where('customer_id', auth()->id())->where('product_id', Product::where('slug', $slug)->first()->id)->first()->id;
        }
        else
        {
            $wishlistStatus = "";
        }
        if(Cart::where('customer_id', auth()->id())->where('product_id', Product::where('slug', $slug)->first()->id)->exists())
        {
            $quantiryValue = Cart::where('product_id', Product::where('slug', $slug)->first()->id)->first()->quantity;
        }
        else
        {
            $quantiryValue = 1;
        }
        return view('frontend.product.product-details', [
            'product' => Product::where('slug', $slug)->first(),
            'productThumbnails' => ProductThumbnail::where('product_id', Product::where('slug', $slug)->first()->id)->get(),
            'size_id' => ProductSize::where('product_id', Product::where('slug', $slug)->first()->id)->get(),
            'color_id' => ProductColor::where('product_id', Product::where('slug', $slug)->first()->id)->get(),
            'related_products' => Product::where('slug', '!=', $slug)->where('category_id', Product::where('slug', $slug)->firstorFail()->category_id)->latest()->limit(40)->get(),
            'wishlistStatus' => $wishlistStatus,
            'sizeStatus' => ProductSize::where('product_id', Product::where('slug', $slug)->first()->id)->exists(),
            'clolorStatus' => ProductColor::where('product_id', Product::where('slug', $slug)->first()->id)->exists(),
            'quantiryValue' => $quantiryValue,
        ]);
    }


}
