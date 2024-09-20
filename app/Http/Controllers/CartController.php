<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
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

    function index(Request $request)
    {
        $discount = 0;
        $coupon = '';
        $message = '';
        $highest_amount = '';

        if ($request->coupon) {
            $coupon = $request->coupon;
            if (Coupon::where('name', $coupon)->exists()) {
                if (Coupon::where('name', $coupon)->where('limit', '!=', 0)->exists()) {
                    if (Carbon::now()->format('Y-m-d') < Coupon::where('name', $coupon)->first()->validity) {
                        $discount = Coupon::where('name', $coupon)->first()->amount;
                        $highest_amount = Coupon::where('name', $coupon)->first()->highest_amount;
                    } else {
                        $message = 'Coupon Expired!';
                        $discount = 0;
                    }
                } else {
                    $message = 'Coupon Does not Limit!';
                    $discount = 0;
                }
            } else {
                $message = 'Coupon Does not exists!';
                $discount = 0;
            }
        } else {
            $discount = 0;
            $coupon = '';
        }

        $carts = Cart::where('customer_id', Auth::guard('customer')->id())->get();
        return view('frontend.cart', compact('carts', 'coupon', 'discount', 'message','highest_amount'));
    }

    function clear()
    {
        Cart::where('customer_id', Auth::guard('customer')->id())->delete();
        return back();
    }

    function update(Request $request)
    {
        foreach ($request->quantity as $cart_id => $quantity) {
            Cart::find($cart_id)->update([
                'quantity' => $quantity,
                'updated_at' => Carbon::now(),
            ]);
            return back();
        }
    }
}
