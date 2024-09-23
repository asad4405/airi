<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use App\Models\CustomerEmailVerify as CustomerVerifyEmail;
use App\Notifications\CustomerEmailVerify;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    function google_callback()
    {
        $user = Socialite::driver('google')->user();

        if (Customer::where('email', $user->getEmail())->exists()) {
            Auth::guard('customer')->login(Customer::where('email', $user->getEmail())->first());
            return redirect()->route('customer.profile');
        } else {
            $random_password = Str::upper(Str::random(8));
            $customer_info = Customer::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($random_password),
                'created_at' => Carbon::now(),
            ]);

            CustomerVerifyEmail::where('customer_id', $customer_info->id)->delete();

            $info = CustomerVerifyEmail::create([
                'customer_id' => $customer_info->id,
                'token' => uniqid(),
                'created_at' => Carbon::now(),
            ]);

            Notification::send($customer_info, new CustomerEmailVerify($info));

            return redirect()->route('customer.register')->with('success', 'Customer Registered Success, Please Verify your Email!');

            if (Auth::guard('customer')->attempt(['email' => $user->getEmail(), 'password' => $random_password])) {
                return redirect()->route('customer.profile');
            } else {
                return 'Something Wrong!';
            }
        }
    }
}
