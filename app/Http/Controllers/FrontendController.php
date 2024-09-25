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
        $products = Product::where(function ($q) use ($data) {
            if (!empty($data['search']) && $data['search'] != '' && $data['search'] != 'undefind') {
                $q->where(function ($q) use ($data) {
                    $q->where('product_name', 'like', '%' . $data['search'] . '%');
                    $q->orWhere('short_desp', 'like', '%' . $data['search'] . '%');
                    $q->orWhere('long_desp', 'like', '%' . $data['search'] . '%');
                });
            }
        })->get();
        $categories = Category::all();
        return view('frontend.shop', compact('products', 'categories'));
    }
}
