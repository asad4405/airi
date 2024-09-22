<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $orders = Order::where('customer_id',Auth::guard('customer')->id())->latest()->get();
        return view('frontend.customer.profile',compact('orders'));
    }

    function update(Request $request)
    {
        if ($request->password == '') {
            if ($request->photo == '') {
                Customer::find(Auth::guard('customer')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'zip' => $request->zip,
                    'address' => $request->address,
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                if (Auth::guard('customer')->photo != null) {
                    $current = public_path('uploads/customer/' . Auth::guard('customer')->user()->photo);
                    unlink($current);
                }

                $photo = $request->photo;
                $extension = $photo->extension();
                $file_name = 'customer-' . uniqid() . '.' . $extension;

                Customer::find(Auth::guard('customer')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'zip' => $request->zip,
                    'address' => $request->address,
                    'photo' => $file_name,
                    'updated_at' => Carbon::now(),
                ]);
            }
        } else {
            if ($request->photo == '') {
                Customer::find(Auth::guard('customer')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'zip' => $request->zip,
                    'address' => $request->address,
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                if (Auth::guard('customer')->photo != null) {
                    $current = public_path('uploads/customer/' . Auth::guard('customer')->user()->photo);
                    unlink($current);
                }

                $photo = $request->photo;
                $extension = $photo->extension();
                $file_name = 'customer-' . uniqid() . '.' . $extension;

                Customer::find(Auth::guard('customer')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'zip' => $request->zip,
                    'address' => $request->address,
                    'photo' => $file_name,
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
        return back()->with('success', 'Profile Updated!');
    }

    function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('index');
    }

    function invoice($id)
    {
        $order_id = Order::find($id)->order_id;
        $pdf = Pdf::loadView('frontend.customer.pdf.invoice', compact('order_id'));
        return $pdf->download('invoice.pdf');
    }
}
