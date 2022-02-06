<?php

use App\Models\AllColor;
use App\Models\AllSize;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductThumbnail;
use App\Models\Setting;
use App\Models\User;
use App\Models\Wishlist;

function getsize($id)
{
    return AllSize::where('id', $id)->first()->size_name;
}


function getcolor($id)
{
    return AllColor::where('id', $id)->first()->color_name;
}

function headerandfooterinfo()
{
    return Setting::all();
}

function allCategories()
{
    return Category::all();
}
function tenCategoryShow()
{
    return Category::limit(10)->latest()->get();
}
function getProduct($id)
{
    return Product::where('category_id', $id)->get();
}

function getWishlist()
{
    return Wishlist::where('customer_id', auth()->id())->get();
}
function wishList($id)
{
    return Product::find($id);
}

function getCetegory($id)
{
    return Category::find(Product::find($id)->category_id)->category_name;
}
function getVendor($id)
{
    return User::find(Product::find($id)->vendor_id)->name;
}
function getWishlistStatus($slug)
{
    if (Wishlist::where('customer_id', auth()->id())->where('product_id', Product::where('slug', $slug)->first()->id)->exists())
    {
        return $wishlistStatus = Wishlist::where('customer_id', auth()->id())->where('product_id', Product::where('slug', $slug)->first()->id)->first()->id;
    }
    else
    {
        return $wishlistStatus = "";
    }
}

function getCart()
{
    return Cart::where('customer_id', auth()->id())->limit(2)->get();
}
function cart($id)
{
    return Product::find($id);
}
function cartAmount($id)
{
    return Cart::where('customer_id', auth()->id())->where('product_id', $id)->first()->quantity;
}
function totalCart()
{
    return Cart::where('customer_id', auth()->id())->get();
}
function get_thumbnails($id)
{
   return ProductThumbnail::where('product_id', $id)->get();
}

function getSizeStatus($id)
{
    return ProductSize::where('product_id', $id)->exists();
}
function getSizeForWlcome($id)
{
    return ProductSize::where('product_id', $id)->get();
}
function getColorStatus($id)
{
    return ProductColor::where('product_id', $id)->exists();
}
function getColorForWlcome($id)
{
    return ProductColor::where('product_id', $id)->get();
}
