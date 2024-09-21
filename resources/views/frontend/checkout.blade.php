@extends('layouts.frontend_master')
@section('title')
    Checkout
@endsection
@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Checkout</h1>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li class="current"><span>Checkout</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="page-content-inner">
            <div class="container">
                <form action="{{ route('checkout.order.store') }}" method="POST">
                    @csrf
                    <div class="row pb--80 pb-md--60 pb-sm--40">
                        <!-- Checkout Area Start -->
                        <div class="col-lg-6">
                            <div class="checkout-title mt--10">
                                <h2>Billing Details</h2>
                            </div>
                            <div class="checkout-form">
                                <div class="form form--checkout">
                                    <div class="row mb--30">
                                        <div class="form__group col-md-12 mb-sm--30">
                                            <label for="billing_fname" class="form__label form__label--2">Full Name
                                                <span class="required">*</span></label>
                                            <input type="text" name="name" id="billing_fname"
                                                class="form__input form__input--2"
                                                value="{{ Auth::guard('customer')->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="row mb--30">
                                        <div class="form__group col-md-12 mb-sm--30">
                                            <label for="billing_fname" class="form__label form__label--2">Email Address
                                                <span class="required">*</span></label>
                                            <input type="email" name="email" id="billing_fname"
                                                class="form__input form__input--2"
                                                value="{{ Auth::guard('customer')->user()->email }}">
                                        </div>
                                    </div>
                                    <div class="row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_phone" class="form__label form__label--2">Phone <span
                                                    class="required">*</span></label>
                                            <input type="text" name="phone" id="billing_phone"
                                                class="form__input form__input--2"
                                                value="{{ Auth::guard('customer')->user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_country" class="form__label form__label--2">Country
                                                <span class="required">*</span></label>
                                            <select id="billing_country" name="country"
                                                class="form__input form__input--2 nice-select country_id">
                                                <option value="">Select a country…</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_country" class="form__label form__label--2">City
                                                <span class="required">*</span></label>
                                            <select id="billing_country" name="city"
                                                class="form__input form__input--2 city_id">
                                                <option value="">Select a country</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_company" class="form__label form__label--2">Company Name
                                                (Optional)</label>
                                            <input type="text" name="company" id="billing_company"
                                                class="form__input form__input--2">
                                        </div>
                                    </div>
                                    <div class="row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_streetAddress" class="form__label form__label--2">Street
                                                Address <span class="required">*</span></label>

                                            <input type="text" name="address" id="billing_streetAddress"
                                                class="form__input form__input--2 mb--30"
                                                placeholder="House number and street name">
                                        </div>
                                    </div>

                                    <div class="row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_state" class="form__label form__label--2">State / Zip
                                                <span class="required">*</span></label>
                                            <input type="text" name="zip" id="billing_state"
                                                class="form__input form__input--2"
                                                value="{{ Auth::guard('customer')->user()->zip }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form__group col-12">
                                            <div class="custom-checkbox mb--20">
                                                <input type="checkbox" name="ship_check" id="shipdifferetads"
                                                    class="form__checkbox" value="1">

                                                <label for="shipdifferetads"
                                                    class="form__label form__label--2 shipping-label">Ship To A
                                                    Different Address?</label>
                                            </div>
                                            <div class="ship-box-info hide-in-default mt--30">
                                                <div class="row mb--30">
                                                    <div class="form__group col-md-12 mb-sm--30">
                                                        <label for="billing_fname" class="form__label form__label--2">Full
                                                            Name
                                                            <span class="required">*</span></label>
                                                        <input type="text" name="ship_name" id="billing_fname"
                                                            class="form__input form__input--2">
                                                    </div>
                                                </div>
                                                <div class="row mb--30">
                                                    <div class="form__group col-md-12 mb-sm--30">
                                                        <label for="billing_fname"
                                                            class="form__label form__label--2">Email
                                                            Address
                                                            <span class="required">*</span></label>
                                                        <input type="email" name="ship_email" id="billing_fname"
                                                            class="form__input form__input--2">
                                                    </div>
                                                </div>
                                                <div class="row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="billing_phone"
                                                            class="form__label form__label--2">Phone
                                                            <span class="required">*</span></label>
                                                        <input type="text" name="ship_phone" id="billing_phone"
                                                            class="form__input form__input--2">
                                                    </div>
                                                </div>
                                                <div class="row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="billing_country"
                                                            class="form__label form__label--2">Country
                                                            <span class="required">*</span></label>
                                                        <select id="billing_country" name="ship_country"
                                                            class="form__input form__input--2 nice-select country_id">
                                                            <option value="">Select a country…</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}">{{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="billing_country"
                                                            class="form__label form__label--2">City
                                                            <span class="required">*</span></label>
                                                        <select id="billing_country" name="ship_city"
                                                            class="form__input form__input--2 city_id">
                                                            <option value="">Select a country</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="billing_company"
                                                            class="form__label form__label--2">Company Name
                                                            (Optional)</label>
                                                        <input type="text" name="ship_company" id="billing_company"
                                                            class="form__input form__input--2">
                                                    </div>
                                                </div>
                                                <div class="row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="billing_streetAddress"
                                                            class="form__label form__label--2">Street
                                                            Address <span class="required">*</span></label>

                                                        <input type="text" name="ship_address"
                                                            id="billing_streetAddress"
                                                            class="form__input form__input--2 mb--30"
                                                            placeholder="House number and street name">
                                                    </div>
                                                </div>

                                                <div class="row mb--30">
                                                    <div class="form__group col-12">
                                                        <label for="billing_state"
                                                            class="form__label form__label--2">State /
                                                            Zip
                                                            <span class="required">*</span></label>
                                                        <input type="text" name="ship_zip" id="billing_state"
                                                            class="form__input form__input--2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form__group col-12">
                                            <label for="orderNotes" class="form__label form__label--2">Order
                                                Notes</label>
                                            <textarea class="form__input form__input--2 form__input--textarea" id="orderNotes" name="notes"
                                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 offset-xl-1 col-lg-6 mt-md--40">
                            <div class="order-details">
                                <div class="checkout-title mt--10">
                                    <h2>Your Order</h2>
                                </div>
                                <div class="table-content table-responsive mb--30">
                                    <table class="table order-table order-table-2">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th class="text-end">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart)
                                                <tr>
                                                    <th>{{ $cart->product->product_name }}
                                                        <strong><span>&#10005;</span>{{ $cart->quantity }}</strong>
                                                    </th>
                                                    <td class="text-end">
                                                        {{ $cart->quantity * $cart->product->after_discount }}
                                                        Taka</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td class="text-end">{{ session('S_sub_total') }} Taka</td>
                                                <input type="hidden" name="sub_total"
                                                    value="{{ session('S_sub_total') }}">
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>Coupon</th>
                                                @if (session('S_coupon'))
                                                    <td class="text-end">{{ session('S_coupon') }} </td>
                                                    <input type="hidden" name="coupon"
                                                        value="{{ session('S_coupon') }}">
                                                @else
                                                    <td class="text-end">N\A</td>
                                                @endif
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>Discount</th>
                                                @if (session('S_discount'))
                                                    <td class="text-end">(-) {{ session('S_discount') }} Taka</td>
                                                    <input type="hidden" name="discount"
                                                        value="{{ session('S_discount') }}">
                                                @else
                                                    <td class="text-end">N\A</td>
                                                @endif
                                            </tr>
                                            <tr class="shipping">
                                                <th>Shipping</th>
                                                <td class="text-end">
                                                    <span>(+) 100 Taka</span>
                                                </td>
                                                <input type="hidden" name="charge" value="100">
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td class="text-end">
                                                    <span class="order-total-ammount">{{ session('S_total') }} Taka </span>
                                                    <input type="hidden" name="total" value="{{ session('S_total') }}">
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="checkout-payment">
                                    <div class="payment-form">
                                        <div class="payment-group mb--10">
                                            <div class="payment-radio">
                                                <input type="radio" value="1" name="payment_method" id=""
                                                    checked>
                                                <label class="payment-label" for="cash">
                                                    CASH ON DELIVERY
                                                </label>
                                            </div>
                                        </div>
                                        <div class="payment-group mb--10">
                                            <div class="payment-radio">
                                                <input type="radio" value="2" name="payment_method" id="">
                                                <label class="payment-label" for="cheque">
                                                    SSL Payment
                                                </label>
                                            </div>
                                        </div>
                                        <div class="payment-group mb--10">
                                            <div class="payment-radio">
                                                <input type="radio" value="3" name="payment_method" id="">
                                                <label class="payment-label" for="cheque">Stripe Payment</label>
                                            </div>
                                        </div>
                                        <div class="payment-group mt--20">
                                            <p class="mb--15">Your personal data will be used to process your order,
                                                support your experience throughout this website, and for other purposes
                                                described in our privacy policy.</p>
                                            <button type="submit" class="btn btn-fullwidth btn-style-1">Place
                                                Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Area End -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
@section('footer_script')
    <script>
        $('.country_id').change(function() {
            var country_id = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/checkout/getcity',
                type: 'POST',
                data: {
                    country_id: country_id
                },
                success: function(data) {
                    $('.city_id').html(data);
                }
            });
        });
    </script>
@endsection
