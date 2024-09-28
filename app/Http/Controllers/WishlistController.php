<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    function add(Request $request)
    {
        Wishlist::create([
            'customer_id' => Auth::guard('customer')->id(),
            'product_id' => $request->product_id,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('wishlist.index');
    }

    function index()
    {
        $wishlists = Wishlist::where('customer_id', Auth::guard('customer')->id())->get();
        return view('frontend.wishlist', compact('wishlists'));
    }

    function delete($id)
    {
        Wishlist::find($id)->delete();
        return back();
    }
}
