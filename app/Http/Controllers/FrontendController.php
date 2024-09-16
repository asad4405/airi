<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
        $products = Product::latest()->get();
        return view('frontend.index',[
            'products' => $products,
        ]);
    }

    function product_details()
    {

        return view('frontend.product_details',[
            //
        ]);
    }
}
