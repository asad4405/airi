<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    function index()
    {
        $products = Product::latest()->get();
        return view('frontend.index', [
            'products' => $products,
        ]);
    }

    function product_details($slug)
    {
        $product_id = Product::where('slug', $slug)->first()->id;
        $product = Product::find($product_id);
        $reviews = OrderProduct::where('product_id', $product_id)->whereNotNull('review')->get();
        $related_products = Product::where('id', '!=', $product_id)->where('category_id', $product->category_id)->get();
        return view('frontend.product_details', [
            'product' => $product,
            'reviews' => $reviews,
            'related_products' => $related_products,
        ]);
    }

    function review_store(Request $request, $id)
    {
        $request->validate([
            'star' => 'required',
            'review' => 'required',
        ]);
        OrderProduct::where([
            'customer_id' => Auth::guard('customer')->id(),
            'product_id' => $id,
        ])->first()->update([
            'star' => $request->star,
            'review' => $request->review,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('review', 'Review Added Successfully!');
    }

    function shop(Request $request)
    {
        $data = $request->all();
        $products = Product::all();
        $categories = Category::all();
        return view('frontend.shop', compact('products', 'categories'));
    }
}
