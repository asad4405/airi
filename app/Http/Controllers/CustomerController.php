<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerEmailVerify as CustomerVerifyEmail;
use App\Models\Order;
use App\Notifications\CustomerEmailVerify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Notification;

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

        $customer_info = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        CustomerVerifyEmail::where('customer_id',$customer_info->id)->delete();

        $info = CustomerVerifyEmail::create([
            'customer_id' => $customer_info->id,
            'token' => uniqid(),
            'created_at' => Carbon::now(),
        ]);

        Notification::send($customer_info, new CustomerEmailVerify($info));

        return back()->with('success', 'Customer Registered Success, Please Verify your Email!');
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
                if (Auth::guard('customer')->user()->email_verified_at == null) {
                    return redirect()->route('customer.login')->with('verify', 'Please Verify your Account!');
                } else {
                    return redirect()->route('customer.profile');
                }
            } else {
                return back()->with('error', 'Password Wrong!');
            }
        } else {
            return back()->with('error', 'Email Does not Exists!');
        }
    }

    function profile()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->id())->latest()->get();
        return view('frontend.customer.profile', compact('orders'));
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

    function email_verify_customer($token)
    {
        if(CustomerVerifyEmail::where('token',$token)->exists()){
            $verify_info = CustomerVerifyEmail::where('token',$token)->first();

            Customer::find($verify_info->customer_id)->update([
                'email_verified_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            CustomerVerifyEmail::where('token',$token)->delete();
            return redirect()->route('customer.login')->with('email_verify','Email Verify Success, Please Login your Account');
        }else{
            abort('404');
        }
    }

    function email_verify_resend ()
    {
        return view('frontend.customer.resend_email_verify');
    }

    function email_verify_resend_link(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        if(Customer::where('email',$request->email)->exists()){
            $customer_info = Customer::where('email', $request->email)->first();
            CustomerVerifyEmail::where('customer_id', $customer_info->id)->delete();

            $info = CustomerVerifyEmail::create([
                'customer_id' => $customer_info->id,
                'token' => uniqid(),
                'created_at' => Carbon::now(),
            ]);

            Notification::send($customer_info, new CustomerEmailVerify($info));

            return back()->with('success', 'We have sent you verification link, Please Verify your Email!');
        }else{
            return back()->with('exists', 'Email does not Exists!');
        }
    }
}
