<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function add(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        Cart::create([
            'customer_id' => Auth::guard('customer')->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('index')->with('cart_success', 'Cart Added Success!');
    }

    function remove($id)
    {
        Cart::find($id)->delete();
        return back();
    }

    function index()
    {
        $carts = Cart::where('customer_id', Auth::guard('customer')->id())->get();
        return view('frontend.cart', compact('carts'));
    }

    function clear()
    {
        Cart::where('customer_id',Auth::guard('customer')->id())->delete();
        return back();
    }

    function update(Request $request)
    {
        foreach($request->quantity as $cart_id => $quantity)
        {
            Cart::find($cart_id)->update([
                'quantity' => $quantity,
                'updated_at' => Carbon::now(),
            ]);
            return back();
        }
    }
}
