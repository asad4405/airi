<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Billing;
use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    function checkout()
    {
        $countries = Country::all();
        $carts = Cart::where('customer_id', Auth::guard('customer')->id())->get();
        return view('frontend.checkout', compact('countries', 'carts'));
    }

    function getcity(Request $request)
    {
        $str = '<option value="">Select a city</option>';
        $cities = City::where('country_id', $request->country_id)->get();

        foreach ($cities as $city) {
            $str .= '<option value=' . $city->id . '>' . $city->name . '</option>';
        }
        echo $str;
    }

    function order_store(Request $request)
    {
        $order_id = '#' . random_int(1000000, 9999999) . uniqid();
        if ($request->payment_method == 1) {
            Order::create([
                'order_id' => $order_id,
                'customer_id' => Auth::guard('customer')->id(),
                'coupon' => $request->coupon,
                'sub_total' => $request->sub_total,
                'total' => $request->total,
                'discount' => $request->discount,
                'charge' => $request->charge,
                'payment_method' => $request->payment_method,
                'order_date' => Carbon::now()->format('Y-m-d'),
                'created_at' => Carbon::now(),
            ]);

            Billing::create([
                'order_id' => $order_id,
                'customer_id' => Auth::guard('customer')->id(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'country_id' => $request->country,
                'city_id' => $request->city,
                'company_name' => $request->company_name,
                'address' => $request->address,
                'zip' => $request->zip,
                'notes' => $request->notes,
                'created_at' => Carbon::now(),
            ]);

            if ($request->ship_check == 1) {
                Shipping::create([
                    'order_id' => $order_id,
                    'customer_id' => Auth::guard('customer')->id(),
                    'ship_name' => $request->ship_name,
                    'ship_email' => $request->ship_email,
                    'ship_phone' => $request->ship_phone,
                    'ship_country_id' => $request->ship_country,
                    'ship_city_id' => $request->ship_city,
                    'ship_company_name' => $request->ship_company,
                    'ship_address' => $request->ship_address,
                    'ship_zip' => $request->ship_zip,
                    'notes' => $request->notes,
                    'created_at' => Carbon::now(),
                ]);
            } else {
                Shipping::create([
                    'order_id' => $order_id,
                    'customer_id' => Auth::guard('customer')->id(),
                    'ship_name' => $request->name,
                    'ship_email' => $request->email,
                    'ship_phone' => $request->phone,
                    'ship_country_id' => $request->country,
                    'ship_city_id' => $request->city,
                    'ship_company_name' => $request->company,
                    'ship_address' => $request->address,
                    'ship_zip' => $request->zip,
                    'notes' => $request->notes,
                    'created_at' => Carbon::now(),
                ]);
            }

            $carts = Cart::where('customer_id', Auth::guard('customer')->id())->get();
            foreach ($carts as $cart) {
                OrderProduct::create([
                    'order_id' => $order_id,
                    'customer_id' => $cart->customer_id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->product->after_discount,
                    'quantity' => $cart->quantity,
                    'created_at' => Carbon::now(),
                ]);
                // remove cart
                Cart::find($cart->id)->delete();
                // decreament quantity with inventory
                Inventory::where('product_id', $cart->product_id)->decrement('quantity', $cart->quantity);
            }
            // decrement coupon
            if ($request->coupon) {
                Coupon::where('name', $request->coupon)->decrement('limit');
            }
            Mail::to($request->email)->send(new OrderMail($order_id));
            return redirect()->route('checkout.order.success')->with('success', $order_id);
        } elseif ($request->payment_method == 2) {
            $data = $request->all();
            return redirect()->route('sslpay')->with('data', $data);
        } else {
            //
        }
    }

    function order_success()
    {
        return view('frontend.customer.order_success');
    }
}
