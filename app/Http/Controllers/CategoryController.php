<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    function category()
    {
        $categories = Category::all();
        return view('backend.category.index',compact('categories'));
    }

    function category_store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'image' => 'required|file|mimes:png,jpg,jpeg'
        ]);

        $image = $request->image;
        $extension = $image->extension();
        $file_name = 'category-' . random_int(10000, 99999).'-' . time() .'-'. uniqid() . '.' . $extension;

        Image::make($image)->save(public_path('uploads/category/'. $file_name));

        Category::insert([
            'category_name' => $request->category_name,
            'image' => $file_name,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('add_category','Category Added Success!');
    }

    function category_edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
    }

    function category_update(Request $request, $id)
    {
        $category = Category::find($id);

        if($request->image == ''){
            $category->update([
                'category_name' => $request->category_name,
            ]);
        }else{
            $current_img = public_path('uploads/category/'.$category->image );
            unlink($current_img);

            $image = $request->image;
            $extension = $image->extension();
            $file_name = 'category-' . random_int(10000, 99999) . '-' . time() . '-' . uniqid() . '.' . $extension;

            Image::make($image)->save(public_path('uploads/category/' . $file_name));

            $category->update([
                'category_name' => $request->category_name,
                'image' => $file_name,
                'created_at' => Carbon::now(),
            ]);
        }

        return back()->with('update_category','Category Update Success!');
    }

    function category_delete($id)
    {
        $category = Category::find($id);

        if($category->image){
            $current_img = public_path('uploads/category/' . $category->image);
            unlink($current_img);
        }
        $category->delete();

        return back()->with('category_delete','Category Deleted Success!');
    }
}
