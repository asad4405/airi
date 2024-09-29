@extends('layouts.frontend_master')
@section('title')
    Cart
@endsection
@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center col-12">
                    <h1 class="page-title">Cart</h1>
                    <ul class="breadcrumb justify-content-center">
                        {{ Breadcrumbs::render('cart') }}
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
                                                    $flag = false;
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
                                                                @php
                                                                    $inventory = App\Models\Inventory::where(
                                                                        'product_id',
                                                                        $cart->product_id,
                                                                    )->first();
                                                                @endphp
                                                                @if (empty($inventory) || $inventory->quantity < $cart->quantity)
                                                                    @php
                                                                        $flag = true;
                                                                    @endphp
                                                                    <span class="badge bg-danger">Sold Out</span>
                                                                @endif
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
                                                        <td colspan="4" class="text-center text-danger">No Products
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
                                        <form action="{{ route('cart.index') }}" method="GET">
                                            <div class="col-sm-8">
                                                <div class="coupon">
                                                    <input type="text" id="" name="coupon"
                                                        class="cart-form__input" placeholder="Coupon Code"
                                                        value="{{ $coupon }}">
                                                    <button type="submit" class="cart-form__btn">Apply Coupon</button>
                                                </div>
                                                @if ($message)
                                                    <span class="text-danger">{{ $message }}</span>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                    <br>
                                    <table class="table order-table">
                                        <tbody>
                                            <tr>
                                                <th>Subtotal (+) :</th>
                                                <td>{{ $sub_total }} Taka</td>
                                                {{ session(['S_sub_total' => $sub_total]) }}
                                            </tr>
                                            <tr>
                                                <th>Coupon :</th>
                                                @if ($coupon)
                                                    <td>{{ $coupon }}</td>
                                                    {{ session(['S_coupon' => $coupon]) }}
                                                @else
                                                    <td>N\A</td>
                                                @endif
                                            </tr>
                                            @php
                                                $calculated_discount = floor(($sub_total * $discount) / 100);
                                            @endphp
                                            <tr>
                                                <th>Coupon Discount (-) :</th>
                                                @if ($calculated_discount > $highest_amount)
                                                    <td>{{ $highest_amount }} Taka</td>
                                                    {{ session(['S_discount' => $highest_amount]) }}
                                                @else
                                                    <td>{{ $calculated_discount }} Taka</td>
                                                    {{ session(['S_discount' => $calculated_discount]) }}
                                                @endif
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td>
                                                    <span class="product-price-wrapper">
                                                        @if ($calculated_discount > $highest_amount)
                                                            <span
                                                                class="money">{{ (int) $sub_total - (int) $highest_amount }}
                                                                Taka</span>
                                                            {{ session(['S_total' => (int) $sub_total - (int) $highest_amount]) }}
                                                        @else
                                                            <span class="money">{{ $sub_total - $calculated_discount }}
                                                                Taka</span>
                                                            {{ session(['S_total' => (int) $sub_total - (int) $calculated_discount]) }}
                                                        @endif
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
                                @if ($flag)
                                    <div class="alert alert-danger">
                                        Please Check your cart for any sold out item.
                                    </div>
                                @else
                                    <a href="{{ route('checkout.index') }}" class="btn btn-fullwidth btn-style-1">
                                        Proceed To Checkout
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
