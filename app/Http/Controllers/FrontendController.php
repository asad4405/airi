<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        return view('frontend.product_details',[
            'product' => $product,
        ]);
    }
}
