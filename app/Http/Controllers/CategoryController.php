<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category.index', [
            'data' => Category::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            'category_name' => 'required|unique:categories',
            'category_image' => 'required|image'
        ]);
        $category_image = time().'-'.Str::random(5).'-category-image.'.$request->file('category_image')->getClientOriginalExtension();
        Image::make($request->file('category_image'))->resize(600, 370)->save(base_path('public/uploads/category_photo/'.$category_image));

        Category::insert([
            'category_name' => $request->category_name,
            'category_image' => $category_image,
            'created_at' => Carbon::now()
        ]);
        return back()->with('categorySuccess', 'Category Added Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.category.edit', [
            'data' => Category::where('id', Crypt::decrypt($id))->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'category_name' => 'required|unique:categories',
            'category_name' => 'required',
            'category_image' => 'image'
        ]);
        if($request->hasFile('category_image'))
        {
            // unlink(base_path('public/uploads/category_photo/'.Category::find(decrypt($id)->category_image)));
            unlink(base_path('public/uploads/category_photo/'.Category::find(Crypt::decrypt($id))->category_image));
            $category_image = time().'-'.Str::random(5).'-category-image.'.$request->file('category_image')->getClientOriginalExtension();
            Image::make($request->file('category_image'))->resize(600, 370)->save(base_path('public/uploads/category_photo/'.$category_image));
            Category::find(Crypt::decrypt($id))->update([
                'category_image' => $category_image
            ]);
        }
        Category::find(Crypt::decrypt($id))->update([
            'category_name' => $request->category_name
        ]);
        return redirect('category')->with('categorySuccess', 'Category Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        unlink(base_path('public/uploads/category_photo/'.Category::find(Crypt::decrypt($id))->category_image));
        Category::find(Crypt::decrypt($id))->delete();
        return redirect('category')->with('categorySuccessD', 'Category Delete Successfull');
    }
}
