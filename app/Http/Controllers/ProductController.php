<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_gallery;
use App\Models\Subcategory;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $tags = Tag::all();
        return view('backend.product.create', [
            'tags' => $tags,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
            'preview' => 'required|file|mimes:png,jpg,jpeg|image'
        ]);

        $preview = $request->preview;
        $extension = $preview->extension();
        $file_name =
            'product-' . random_int(10000, 99999) . '-' . time() . '-' . uniqid() . '.' . $extension;

        Image::make($preview)->save(public_path('uploads/product/' . $file_name));

        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'discount' => $request->discount,
            'after_discount' => $request->product_price - $request->product_price * $request->discount / 100,
            'tags' => $request->tags,
            'short_desp' => $request->short_desp,
            'long_desp' => $request->long_desp,
            'addi_info' => $request->addi_info,
            'preview' => $file_name,
            'created_at' => Carbon::now(),
        ]);

        $product_galleries = $request->product_gallery;

        foreach ($product_galleries as $product_gallery) {
            $extension = $product_gallery->extension();
            $file_name = $product_id . '-' . 'product-' . random_int(10000, 99999) . '-' . time() . '-' . uniqid() . '.' . $extension;
            Image::make($preview)->save(public_path('uploads/product_gallery/' . $file_name));

            Product_gallery::insert([
                'product_id' => $product_id,
                'product_gallery' => $file_name,
                'created_at' => Carbon::now(),
            ]);
        }

        return back()->with('add_product', 'Product Added Success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->preview) {
            $current_img = public_path('uploads/category/' . $product->preview);
            unlink($current_img);
        }
        $product->delete();
        return back();
    }
}
