<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\is_admin;





Route::get('/', [FrontendController::class, 'index'])->name('frontend');
Route::get('category/product/{id}', [FrontendController::class, 'categorywasproduct'])->name('categorywas.product');
Route::get('product-details/{slug}', [FrontendController::class, 'productDetails'])->name('product.details');

Auth::routes();
// Admin Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('category', CategoryController::class)->middleware(['auth','is_admin']);
Route::resource('coupon', CouponController::class)->middleware(['auth','is_admin']);
Route::resource('vendor', VendorController::class)->middleware(['auth','is_admin']);
Route::get('users/profiles', [HomeController::class, 'profile'])->name('profile');
Route::post('/profiles/update/successfull', [HomeController::class, 'profileupdate'])->name('profile.update');
Route::post('/profile/update', [HomeController::class, 'profileupdate'])->name('profile.update');
Route::post('/password/update/{id}', [HomeController::class, 'passwordupdate'])->name('password.update');
Route::resource('location', LocationController::class)->middleware(['auth','is_admin']);
Route::post('/get/city/list', [LocationController::class, 'getCity']);



Route::get('/settings', [SettingController::class, 'index'])->name('setting.index')->middleware(['auth','is_admin']);
Route::post('/update/header/logo/{id}', [SettingController::class, 'updateHeaderLogo'])->name('update.header.logo')->middleware(['auth','is_admin']);
Route::post('/update/footer/logo/{id}', [SettingController::class, 'updateFooterLogo'])->name('update.footer.logo')->middleware(['auth','is_admin']);
Route::post('/favicon/{id}', [SettingController::class, 'favicon'])->name('favicon')->middleware(['auth','is_admin']);
Route::post('/top/header/update/{id}', [SettingController::class, 'topheader'])->name('top.header')->middleware(['auth','is_admin']);
Route::post('/footer/info/change/{id}', [SettingController::class, 'footerinfochange'])->name('footer.info.change')->middleware(['auth','is_admin']);

Route::get('/banner', [BannerController::class, 'index'])->name('banner.index')->middleware(['auth','is_admin']);
Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit')->middleware(['auth','is_admin']);
Route::post('/banner/update/{id}', [BannerController::class, 'update'])->name('banner.update')->middleware(['auth','is_admin']);

// Product Routes
Route::resource('product', ProductController::class)->middleware(['auth','is_vendor']);

// Customer routes
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index')->middleware('is_customer');
Route::get('/customer/login', [CustomerController::class, 'customerlogin'])->name('customer.login');
Route::get('/wishlist/store/{id}', [WishlistController::class, 'store'])->name('wishlist.store');
Route::get('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('is_customer');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('update.cart')->middleware('is_customer');
Route::post('/cart/store/{id}', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/insert/{slug}', [CartController::class, 'insert'])->name('cart.insert');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index')->middleware('is_customer');
Route::post('/checkout/submit', [CheckoutController::class, 'checkoutSubmit'])->name('checkout.submit');

// Login with github
Route::get('/github/redirect', [GithubController::class, 'githubredirect'])->name('github.redirect');
// Login with github
Route::get('/github/callback', [GithubController::class, 'githubcallback'])->name('github.callback');

// Login with gmail
Route::get('/google/redirect', [GoogleController::class, 'googleredirect'])->name('google.redirect');
// Login with gmail
Route::get('/google/callback', [GoogleController::class, 'googlecallback'])->name('google.callback');
