<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function index()
    {
        $coupons = Coupon::all();
        return view('backend.coupon.index', compact('coupons'));
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required|integer',
            'validity' => 'required|date',
            'limit' => 'required|integer',
            'highest_amount' => 'required|integer',
        ]);

        Coupon::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'validity' => $request->validity,
            'limit' => $request->limit,
            'highest_amount' => $request->highest_amount,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('coupon_add', 'Coupon Added Success!');
    }

    function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('backend.coupon.edit', compact('coupon'));
    }

    function update(Request $request, $id)
    {
        Coupon::find($id)->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'validity' => $request->validity,
            'limit' => $request->limit,
            'highest_amount' => $request->highest_amount,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('coupon.index')->with('success', 'Coupon Updated Success!');
    }

    function delete($id)
    {
        Coupon::find($id)->delete();
        return redirect()->route('coupon.index')->with('success', 'Coupon Deleted Success!');
    }
}
