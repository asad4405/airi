<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Tag;
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

        $based = 'created_at';
        $type = 'DESC';
        if (!empty($data['sort']) && $data['sort'] != '' && $data['sort'] != 'undefined') {
            if ($data['sort'] == 1) {
                $based = 'after_discount';
                $type = 'ASC';
            } elseif ($data['sort'] == 2) {
                $based = 'after_discount';
                $type = 'DESC';
            } elseif ($data['sort'] == 3) {
                $based = 'product_name';
                $type = 'ASC';
            } elseif ($data['sort'] == 4) {
                $based = 'product_name';
                $type = 'DESC';
            }
        }

        $products = Product::where(function ($q) use ($data) {
            if (!empty($data['search']) && $data['search'] != '' && $data['search'] != 'undefind') {
                $q->where(function ($q) use ($data) {
                    $q->where('product_name', 'like', '%' . $data['search'] . '%');
                    $q->orWhere('short_desp', 'like', '%' . $data['search'] . '%');
                    $q->orWhere('long_desp', 'like', '%' . $data['search'] . '%');
                });
            }

            if (!empty($data['category_id']) && $data['category_id'] != '' && $data['category_id'] != 'undefined') {
                $q->where(function ($q) use ($data) {
                    $q->where('category_id', $data['category_id']);
                });
            }
        })->orderBy($based, $type)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.shop', compact('products', 'categories', 'tags'));
    }
}
