@extends('layouts.frontend_master')
@section('title')
    Customer Profile
@endsection
@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center col-12">
                    <h1 class="page-title">My Account</h1>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li class="current"><span>My Account</span></li>
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
                <div class="row pt--80 pt-md--60 pt-sm--40 pb--80 pb-md--60 pb-sm--40">
                    <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="user-dashboard-tab flex-column flex-md-row">
                            <div class="user-dashboard-tab__head nav flex-md-column nav-pills" id="v-pills-tab"
                                role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true">Home</a>
                                <a class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-orders" type="button" role="tab"
                                    aria-controls="v-pills-orders" aria-selected="false">Orders</a>
                                <a class="nav-link" id="v-pills-downloads-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-downloads" type="button" role="tab"
                                    aria-controls="v-pills-downloads" aria-selected="false">Downloads</a>
                                <a class="nav-link" id="v-pills-account_details-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-account_details" type="button" role="tab"
                                    aria-controls="v-pills-account_details" aria-selected="false">Account Details</a>
                                <a class="nav-link" href="{{ route('customer.logout') }}">Logout</a>
                            </div>
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab" tabindex="0">
                                    <div class="tab-pane fade show active" id="dashboard">
                                        <p>Hello <strong>{{ Auth::guard('customer')->user()->name }}</strong> (not
                                            <strong>{{ Auth::guard('customer')->user()->name }}</strong>? <a
                                                href="{{ route('customer.logout') }}">Log out</a>)
                                        </p>
                                        <p>From your account dashboard. you can easily check &amp; view your <a
                                                href="">recent orders</a>, manage your <a href="">shipping and
                                                billing
                                                addresses</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-orders" role="tabpanel"
                                    aria-labelledby="v-pills-orders-tab" tabindex="0">
                                    <div class="message-box mb--30 d-none">
                                        <p><i class="fa fa-check-circle"></i>No order has been made yet.</p>
                                        <a href="shop-sidebar.html">Go Shop</a>
                                    </div>
                                    <div class="table-content table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->order_id }}</td>
                                                        <td class="wide-column">{{ $order->created_at->format('F d') }},
                                                            {{ $order->created_at->format('Y') }}</td>
                                                        @if ($order->status == 0)
                                                            <td>Processing</td>
                                                        @endif
                                                        <td class="wide-column">{{ $order->total + $order->charge }} Taka
                                                        </td>
                                                        @php
                                                            $order_product = App\Models\OrderProduct::where(
                                                                'customer_id',
                                                                Auth::guard('customer')->id(),
                                                            )->first();
                                                        @endphp
                                                        <td>
                                                            <a href="{{ route('product.details', $order_product->product->slug) }}"
                                                                class="btn btn-medium btn-style-1">View</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center text-danger">No Orders
                                                            Available!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-downloads" role="tabpanel"
                                    aria-labelledby="v-pills-downloads-tab" tabindex="0">
                                    <div class="message-box mb--30 d-none">
                                        <p><i class="fa fa-exclamation-circle"></i>No downloads available yet.</p>
                                        <a href="shop-sidebar.html">Go Shop</a>
                                    </div>
                                    <div class="table-content table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Downloads</th>
                                                    <th>Expires</th>
                                                    <th>Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($orders as $order)
                                                    <tr>
                                                        @php
                                                            $order_product = App\Models\OrderProduct::where(
                                                                'customer_id',
                                                                Auth::guard('customer')->id(),
                                                            )->first();
                                                        @endphp
                                                        <td class="wide-column">{{ $order_product->product->product_name }}
                                                        </td>
                                                        <td>{{ $order->created_at->format('F d') }},
                                                            {{ $order->created_at->format('Y') }}</td>
                                                        <td class="wide-column">Never</td>
                                                        <td>
                                                            <a href="{{ route('customer.download.invoice',$order->id) }}" class="btn btn-medium btn-style-1">Download
                                                                Order</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center text-danger">No Orders
                                                            Available!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-account_details" role="tabpanel"
                                    aria-labelledby="v-pills-account_details-tab" tabindex="0">
                                    <form action="{{ route('customer.update') }}" class="form form--account"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row grid-space-30 mb--20">
                                            <div class="col-md-6 mb-sm--20">
                                                <div class="form__group">
                                                    <label class="form__label" for="f_name">Full Name <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="name" class="form__input"
                                                        value="{{ Auth::guard('customer')->user()->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form__group">
                                                    <label class="form__label" for="l_name">Email Address <span
                                                            class="required">*</span></label>
                                                    <input type="email" name="email" class="form__input"
                                                        value="{{ Auth::guard('customer')->user()->email }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row grid-space-30 mb--20">
                                            <div class="col-md-6 mb-sm--20">
                                                <div class="form__group">
                                                    <label class="form__label" for="f_name">Phone Number <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="phone" class="form__input"
                                                        value="{{ Auth::guard('customer')->user()->phone }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form__group">
                                                    <label class="form__label" for="l_name">Email Address <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="zip" class="form__input"
                                                        value="{{ Auth::guard('customer')->user()->zip }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row grid-space-30 mb--20">
                                            <div class="col-md-6 mb-sm--20">
                                                <div class="form__group">
                                                    <label class="form__label" for="f_name">Address <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="address" class="form__input"
                                                        value="{{ Auth::guard('customer')->user()->address }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form__group">
                                                    <label class="form__label" for="l_name">Photo <span
                                                            class="required">*</span></label>
                                                    <input type="file" name="photo" class="form__input">
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset class="form__fieldset mb--20">
                                            <legend class="form__legend">Password change</legend>
                                            <div class="row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label class="form__label" for="cur_pass">Current password
                                                            (leave blank to leave unchanged)</label>
                                                        <input type="password" name="current_password"
                                                            class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label class="form__label" for="new_pass">New password
                                                            (leave blank to leave unchanged)</label>
                                                        <input type="password" name="password" class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label class="form__label" for="conf_new_pass">Confirm new
                                                            password</label>
                                                        <input type="password" name="password_confirmation"
                                                            id="conf_new_pass" class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form__group">
                                                    <button type="submit" class="btn btn-style-1 btn-submit">Save
                                                        Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
