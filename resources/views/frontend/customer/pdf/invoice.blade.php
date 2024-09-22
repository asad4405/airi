 <style>
     body {
         font-family: Arial, sans-serif;
     }

     h2 {
         font-weight: 800;
     }

     .invoice {
         width: 50%;
         margin: 20px auto;
         padding: 20px;
         border: 1px solid #ccc;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         height: 100vh;
     }

     .invoice-header {
         display: flex;
         justify-content: space-between;
         align-items: center;
         margin-bottom: 20px;
     }

     .invoice-header-left {
         flex: 1;
     }

     .invoice-header-right {
         flex: 1;
         text-align: right;
     }

     .invoice-table {
         width: 100%;
         border-collapse: collapse;
         margin-bottom: 20%;
     }

     .invoice-table th,
     .invoice-table td {
         border: 1px solid #000;
         padding: 10px;
         text-align: center;
     }

     .invoice-table th {
         background-color: #E64A19;
         color: #fff;
         font-weight: bold;
         text-align: center;
     }

     .invoice-total {
         float: right;
     }
 </style>
 <div class="invoice">
     <div class="invoice-header">
         <div class="invoice-header-left">
             <h1>Airi Limited</h1>
             <p>Zigatola,Dhanmondi Dhaka 1205</p>
             <p>Email: airi@gmail.com</p>
             <p>Phone: +8801777777777</p>
         </div>
         @php
             $bill = App\Models\Billing::where('order_id', $order_id)->first();
             $ship = App\Models\Billing::where('order_id', $order_id)->first();
             $order_products = App\Models\OrderProduct::where('order_id', $order_id)->get();
             $order = App\Models\Order::where('order_id', $order_id)->first();
         @endphp
         <div class="invoice-header-right">
             <h2>Invoice</h2>
             <p>Invoice Number: {{ $order_id }}</p>
             <p>Date: {{ $order->created_at->format('Y-m-d') }}</p>
         </div>
     </div>

     <table class="invoice-table">
         <thead>
             <tr>
                 <th>Item</th>
                 <th>Quantity</th>
                 <th>Unit Price</th>
                 <th>Total</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($order_products as $order_product)
                 <tr>
                     <td>{{ $order_product->product->first()->product_name }}</td>
                     <td>{{ $order_product->quantity }}</td>
                     <td>{{ $order_product->price }} Taka</td>
                     <td>{{ $order_product->price * $order_product->quantity }} Taka</td>
                 </tr>
             @endforeach
         </tbody>
     </table>

     <div class="invoice-total">
         <p>Subtotal: {{ $order->sub_total }} Taka</p>
         <p>Tax (+): {{ $order->charge }} Taka</p>
         <p>Sub Total: {{ $order->total + $order->charge }} Taka</p>
     </div>

     <div class="invoice-footer">
         <div class="mt-3 text-center">
             <p>Thank you for your support</p>
             <script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button"
                 data-slug="ecodedesign" data-color="#FFDD00" data-emoji="" data-font="Cookie" data-text="Buy me a coffee"
                 data-outline-color="#000000" data-font-color="#000000" data-coffee-color="#ffffff"></script>
         </div>
     </div>
 </div>
