<?php

namespace App\Http\Controllers;

use App\Models\AllColor;
use App\Models\AllSize;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductThumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product.index',[
            'products' => Product::where('vendor_id', auth()->id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create',[
            'sizes' => AllSize::OrderBy('size_name', 'DESC')->get(),
            'colors' => AllColor::OrderBy('color_name', 'DESC')->get(),
            'categories' => Category::OrderBy('category_name', 'DESC')->get()
        ]);
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
            'product_name' => 'required',
            'product_price' => 'required | numeric',
            'stock' => 'required | numeric',
            'category_id' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'product_image' => 'required | image',
            'product_thumbnails' => 'required',
            'brand' => 'required'
        ], [
            'category_id.required' => 'Category field is required'
        ]);

        // product image here
        // upload product
        $product_image = auth()->id().'-'.Str::random(10).'-product-image.'.$request->file('product_image')->getClientOriginalExtension();
        Image::make($request->file('product_image'))->resize(550, 750)->save(base_path('public/uploads/product_photo/'.$product_image));

        $product_id = Product::insertGetId([
            'slug' => Str::slug($request->product_name).'-'.Str::random(5).auth()->id(),
            'vendor_id' => auth()->id(),
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_image' => $product_image,
            'description' => $request->description,
            'long_description' => $request->long_description,
            'stock' => $request->stock,
            'sku' => $request->sku,
            'brand' => $request->brand,
            'weight' => $request->weight,
            'dimension' => $request->dimension,
            'material' => $request->material,
            'others_info' => $request->others_info,
            'created_at' => Carbon::now()
        ]);

        // uploads product thumbnails image

        foreach($request->product_thumbnails as $thumbnail)
        {
            // product thumbnails image here
            $product_thumbnails_image = $product_id.'-'.Str::random(10).'-product-thumbnails.'.$thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(569, 528)->save(base_path('public/uploads/product_thumbnails_photo/'.$product_thumbnails_image));

            ProductThumbnail::insert([
                'product_id' => $product_id,
                'product_thumbnails' =>$product_thumbnails_image,
                'created_at' => Carbon::now()
            ]);
        }

        // uploads product size

        if ($request->size_id) {
            foreach ($request->size_id as $size) {
                ProductSize::insert([
                    'product_id' => $product_id,
                    'size_id' => $size,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        // uploads product color

        if ($request->color_id) {
            foreach ($request->color_id as $color)
            {
                ProductColor::insert([
                    'product_id' => $product_id,
                    'color_id' => $color,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        return back()->with('productSuccess', 'Product Added Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.product.show', [
            'data' => Product::where('id', Crypt::decrypt($id))->first(),
            'sizes' => ProductSize::where('product_id', Crypt::decrypt($id))->get(),
            'colors' => ProductColor::where('product_id', Crypt::decrypt($id))->get(),
            'thumbnails' => ProductThumbnail::where('product_id', Crypt::decrypt($id))->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return Product::where('id', Crypt::decrypt($id))->first()->brand;
        return view('backend.product.edit', [
            'data' => Product::where('id', Crypt::decrypt($id))->first(),
            'thumbnails' => ProductThumbnail::where('product_id', Crypt::decrypt($id))->get(),
            'categories' => Category::OrderBy('category_name', 'DESC')->get(),
            'sizes' => AllSize::OrderBy('size_name', 'DESC')->get(),
            'sizeCheeck' => ProductSize::where('product_id', Crypt::decrypt($id))->exists(),
            'productsizeid' => ProductSize::where('product_id', Crypt::decrypt($id))->get(),
            'colors' => AllColor::OrderBy('color_name', 'DESC')->get(),
            'productcolorid' => ProductColor::where('product_id', Crypt::decrypt($id))->get(),
            'colorCheck' => ProductColor::where('product_id', Crypt::decrypt($id))->exists(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pid)
    {
        $id = Crypt::decrypt($pid);
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required | numeric',
            'stock' => 'required | numeric',
            'category_id' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'product_image' => 'image',
            'brand' => 'required'
        ], [
            'category_id.required' => 'Category field is required'
        ]);
        if($request->hasFile('product_image'))
        {
            unlink(base_path('public/uploads/product_photo/'.Product::find($id)->product_image));
            $product_image = auth()->id().'-'.Str::random(10).'-product-image'.'.'.$request->file('product_image')->getClientOriginalExtension();
            Image::make($request->file('product_image'))->resize(550, 750)->save(base_path('public/uploads/product_photo/'.$product_image));
            Product::find($id)->update([
                'product_image' => $product_image
            ]);
        }

        if($request->hasFile('product_thumbnails'))
        {
            foreach (ProductThumbnail::where('product_id', $id)->get() as $photo)
            {
                unlink(base_path('public/uploads/product_thumbnails_photo/'.$photo->product_thumbnails));
                ProductThumbnail::where('id', $photo->id)->delete();
            }

            foreach($request->product_thumbnails as $thumbnail){
                // product thumbnails image here
                $product_thumbnails_image = $id.'-'.Str::random(10).'-product-thumbnails.'.$thumbnail->getClientOriginalExtension();
                Image::make($thumbnail)->resize(569, 528)->save(base_path('public/uploads/product_thumbnails_photo/'.$product_thumbnails_image));

                ProductThumbnail::insert([
                    'product_id' => $id,
                    'product_thumbnails' =>$product_thumbnails_image,
                    'created_at' => Carbon::now()
                ]);
            }
        }


        if ($request->size_id) {

            ProductSize::where('product_id', $id)->delete();
            foreach ($request->size_id as $size) {
                ProductSize::insert([
                    'product_id' => $id,
                    'size_id' => $size,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        else
        {
            ProductSize::where('product_id', $id)->delete();
        }

        if ($request->color_id)
        {
            ProductColor::where('product_id', $id)->delete();
            foreach ($request->color_id as $color) {
                ProductColor::insert([
                    'product_id' => $id,
                    'color_id' => $color,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        else
        {
            ProductColor::where('product_id', $id)->delete();

        }

        Product::find($id)->update([
            'product_name'=> $request->product_name,
            'product_price' => $request->product_price,
            'stock' => $request->stock,
            'sku' => $request->sku,
            'category_id'=> $request->category_id,
            'description' => $request->description,
            'long_description' => $request->long_description,
            'brand' => $request->brand,
            'weight' => $request->weight,
            'dimension' => $request->dimension,
            'material' => $request->material,
            'others_info' => $request->others_info,
        ]);
        return redirect('product')->with('productSuccess', 'Product Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid)
    {
        $id = Crypt::decrypt($pid);

        unlink(base_path('public/uploads/product_photo/'.Product::find($id)->product_image));

        foreach (ProductThumbnail::where('product_id', $id)->get() as $photo) {
            unlink(base_path('public/uploads/product_thumbnails_photo/'.$photo->product_thumbnails));
            ProductThumbnail::where('product_id', $photo->id)->delete();
        }

        if(ProductColor::where('product_id',$id)->exists())
        {
            ProductColor::where('product_id', $id)->delete();
        }

        if(ProductSize::where('product_id',$id)->exists())
        {
            ProductSize::where('product_id', $id)->delete();
        }

        Product::where('id', $id)->delete();
        return back()->with('productSuccess', 'A Product Delete Successfull');
    }
}
