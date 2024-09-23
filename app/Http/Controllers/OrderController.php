<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function index()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->id())->get();
        return view('backend.order.index', compact('orders'));
    }

    function status_update(Request $request, $id)
    {
        Order::find($id)->update([
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
        return back();
    }
}
