<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Passreset;
use App\Notifications\PassReset as NotificationsPassReset;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    function forgot()
    {
        return view('frontend.customer.forgot');
    }

    function forgot_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        if (Customer::where('email', $request->email)->exists()) {
            $customer = Customer::where('email', $request->email)->first();
            Passreset::where('customer_id', $customer->id)->delete();

            $info = Passreset::create([
                'customer_id' => $customer->id,
                'token' => uniqid(),
                'created_at' => Carbon::now(),
            ]);

            Notification::send($customer, new NotificationsPassReset($info));
            return redirect()->route('customer.login')->with('success', "We sent you a password reset on, $customer->email");
        } else {
            return back()->with('exists', 'Email Does not Exists!');
        }
    }

    function reset_request ($token)
    {
        return view('frontend.customer.reset_confirm',compact('token'));
    }

    function reset_confirm(Request $request, $token)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $passreset = Passreset::where('token',$token)->first();

        if(Passreset::where('token',$token)->exists()){
            Customer::find($passreset->customer_id)->update([
                'password' => Hash::make($request->password),
            ]);
            Passreset::where('token', $token)->delete();
            return redirect()->route('customer.login')->with('success', 'Password Reset Successfull Please Login your Account!');
        }else{
            abort('404');
        }
    }
}
