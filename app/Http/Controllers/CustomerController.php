<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    function register()
    {
        return view('frontend.customer.register');
    }

    function register_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        Customer::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Customer Registered Success!');
    }

    function login()
    {
        return view('frontend.customer.login');
    }

    function login_store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Customer::where('email', $request->email)->exists()) {
            if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('customer.profile');
            } else {
                return back()->with('error', 'Password Wrong!');
            }
        } else {
            return back()->with('error', 'Email Does not Exists!');
        }
    }

    function profile()
    {
        return view('frontend.customer.profile');
    }

    function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('index');
    }
}
