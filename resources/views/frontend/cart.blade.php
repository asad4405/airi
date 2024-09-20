@extends('layouts.frontend_master')
@section('title')
    Cart
@endsection
@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Cart</h1>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li class="current"><span>Cart</span></li>
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
                <div class="row pt--80 pb--80 pt-md--45 pt-sm--25 pb-md--60 pb-sm--40">
                    <div class="col-lg-8 mb-md--30">
                        <form class="cart-form" action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <div class="row g-0">
                                <div class="col-12">
                                    <div class="table-content table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th class="text-start">Product</th>
                                                    <th>price</th>
                                                    <th>quantity</th>
                                                    <th>total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $sub_total = 0;
                                                @endphp
                                                @forelse ($carts as $cart)
                                                    <tr>
                                                        <td class="product-remove text-start"><a
                                                                href="{{ route('cart.remove', $cart->id) }}"><i
                                                                    class="dl-icon-close"></i></a></td>
                                                        <td class="product-thumbnail text-start">
                                                            <img src="{{ asset('uploads/product') }}/{{ $cart->product->preview }}"
                                                                alt="Product Thumnail">
                                                        </td>
                                                        <td class="product-name text-start wide-column">
                                                            <h3>
                                                                <a
                                                                    href="{{ route('product.details', $cart->product->slug) }}">{{ $cart->product->product_name }}</a>
                                                            </h3>
                                                        </td>
                                                        <td class="product-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money">{{ $cart->product->after_discount }}
                                                                    Taka</span>
                                                            </span>
                                                        </td>
                                                        <td class="product-quantity">
                                                            <div class="quantity">
                                                                <input type="number" class="quantity-input"
                                                                    name="quantity[{{ $cart->id }}]"
                                                                    value="{{ $cart->quantity }}" min="1">
                                                            </div>
                                                        </td>
                                                        <td class="product-total-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money"><strong>{{ $cart->quantity * $cart->product->after_discount }}
                                                                        Taka</strong></span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $sub_total += $cart->quantity * $cart->product->after_discount;
                                                    @endphp
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-danger text-center">No Products
                                                            Available!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @if ($carts->count() != 0)
                                <div class="row g-0 border-top pt--20 mt--20">
                                    <div class="col-sm-6 text-sm-start">
                                        <a href="{{ route('cart.clear') }}" class="cart-form__btn">Clear Cart</a>
                                        <button type="submit" class="cart-form__btn">Update Cart</button>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-collaterals">
                            <div class="cart-totals">
                                <h5 class="mb--15">Cart totals</h5>
                                <div class="table-content table-responsive">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="coupon">
                                                <input type="text" id="" name="coupon" class="cart-form__input"
                                                    placeholder="Coupon Code">
                                                <button type="submit" class="cart-form__btn">Apply Coupon</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <table class="table order-table">
                                        <tbody>
                                            <tr>
                                                <th>Subtotal (+)</th>
                                                <td>{{ $sub_total }} Taka</td>
                                            </tr>
                                            <tr>
                                                <th>Coupon Discount (-)</th>
                                                <td>40 Taka</td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td>
                                                    <span class="product-price-wrapper">
                                                        <span class="money">{{ $sub_total }} Taka</span>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if ($carts->count() == 0)
                                <a href="{{ route('index') }}" class="btn btn-fullwidth btn-style-1">
                                    Return Shopping
                                </a>
                            @else
                                <button type="submit" class="btn btn-fullwidth btn-style-1">
                                    Proceed To Checkout
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection