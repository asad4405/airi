<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Mail\OrderMail;
use App\Models\Billing;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Shipping;
use App\Models\Sslorder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {
        $data = session('data');
        $check = '';
        if(empty($data['ship_check'])){
            $check = 0;
        }else{
            $check = 1;
        }
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "sslorders"
        # In "sslorders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = $data['total'] + $data['charge']; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('sslorders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'amount' => $data['total'],
                'status' => 'Pending',
                'address' => $data['address'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
                'country' => $data['country'],
                'city' => $data['city'],
                'company' => $data['company'],
                'zip' => $data['zip'],
                'ship_name' => $data['ship_name'],
                'ship_email' => $data['ship_email'],
                'ship_phone' => $data['ship_phone'],
                'ship_address' => $data['ship_address'],
                'ship_country' => $data['ship_country'],
                'ship_city' => $data['ship_city'],
                'ship_company' => $data['ship_company'],
                'ship_zip' => $data['ship_zip'],
                'notes' => $data['notes'],
                'charge' => $data['charge'],
                'payment_method' => $data['payment_method'],
                'coupon' => $data['coupon'],
                'discount' => $data['discount'],
                'sub_total' => $data['sub_total'],
                'ship_check' => $check,
                'customer_id' => $data['customer_id'],
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }

    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "sslorders"
        # In sslorders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";


        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = DB::table('sslorders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }

    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $data = Sslorder::where('transaction_id',$tran_id)->first();

        $order_id = '#' . random_int(1000000, 9999999) . uniqid();
        if (Coupon::where('coupon',$data->coupon)->exists()) {
            Order::create([
                'order_id' => $order_id,
                'customer_id' => $data->customer_id,
                'coupon' => $data->coupon,
                'sub_total' => $data->sub_total,
                'total' => $data->total,
                'discount' => $data->discount,
                'charge' => $data->charge,
                'payment_method' => $data->payment_method,
                'order_date' => Carbon::now()->format('Y-m-d'),
                'created_at' => Carbon::now(),
            ]);
        }else{
            Order::create([
                'order_id' => $order_id,
                'customer_id' => $data->customer_id,
                'coupon' => 'N\A',
                'sub_total' => $data->sub_total,
                'total' => $data->total,
                'discount' => 0,
                'charge' => $data->charge,
                'payment_method' => $data->payment_method,
                'order_date' => Carbon::now()->format('Y-m-d'),
                'created_at' => Carbon::now(),
            ]);

            Billing::create([
                'order_id' => $order_id,
                'customer_id' => $data->customer_id,
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'country_id' => $data->country,
                'city_id' => $data->city,
                'company_name' => $data->company_name,
                'address' => $data->address,
                'zip' => $data->zip,
                'notes' => $data->notes,
                'created_at' => Carbon::now(),
            ]);

            if ($data->ship_check == 1) {
                Shipping::create([
                    'order_id' => $order_id,
                    'customer_id' => $data->customer_id,
                    'ship_name' => $data->ship_name,
                    'ship_email' => $data->ship_email,
                    'ship_phone' => $data->ship_phone,
                    'ship_country_id' => $data->ship_country,
                    'ship_city_id' => $data->ship_city,
                    'ship_company_name' => $data->ship_company,
                    'ship_address' => $data->ship_address,
                    'ship_zip' => $data->ship_zip,
                    'notes' => $data->notes,
                    'created_at' => Carbon::now(),
                ]);
            } else {
                Shipping::create([
                    'order_id' => $order_id,
                    'customer_id' => $data->customer_id,
                    'ship_name' => $data->name,
                    'ship_email' => $data->email,
                    'ship_phone' => $data->phone,
                    'ship_country_id' => $data->country,
                    'ship_city_id' => $data->city,
                    'ship_company_name' => $data->company,
                    'ship_address' => $data->address,
                    'ship_zip' => $data->zip,
                    'notes' => $data->notes,
                    'created_at' => Carbon::now(),
                ]);
            }

            $carts = Cart::where('customer_id', $data->customer_id)->get();
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
            if ($data->coupon) {
                Coupon::where('name', $data->coupon)->decrement('limit');
            }
            Mail::to($data->email)->send(new OrderMail($order_id));
            return redirect()->route('checkout.order.success')->with('success', $order_id);
        }

        // $amount = $request->input('amount');
        // $currency = $request->input('currency');

        // $sslc = new SslCommerzNotification();

        // #Check order status in order tabel against the transaction id or order id.
        // $order_details = DB::table('sslorders')
        //     ->where('transaction_id', $tran_id)
        //     ->select('transaction_id', 'status', 'currency', 'amount')->first();

        // if ($order_details->status == 'Pending') {
        //     $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

        //     if ($validation) {
        //         /*
        //         That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
        //         in order table as Processing or Complete.
        //         Here you can also sent sms or email for successfull transaction to customer
        //         */
        //         $update_product = DB::table('sslorders')
        //             ->where('transaction_id', $tran_id)
        //             ->update(['status' => 'Processing']);

        //         echo "<br >Transaction is successfully Completed";
        //     }
        // } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
        //     /*
        //      That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
        //      */
        //     echo "Transaction is successfully Completed";
        // } else {
        //     #That means something wrong happened. You can redirect customer to your product page.
        //     echo "Invalid Transaction";
    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('sslorders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('sslorders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('sslorders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('sslorders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('sslorders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('sslorders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                }
            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }
}
