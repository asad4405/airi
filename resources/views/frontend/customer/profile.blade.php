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
                        <div class="user-dashboard-tab flex-column flex-md-row">
                            <div class="user-dashboard-tab__head nav flex-md-column" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" data-toggle="pill" role="tab" href="#dashboard"
                                    aria-controls="dashboard" aria-selected="true">Dashboard</a>
                                <a class="nav-link" data-toggle="pill" role="tab" href="#orders" aria-controls="orders"
                                    aria-selected="true">Orders</a>
                                <a class="nav-link" data-toggle="pill" role="tab" href="#downloads"
                                    aria-controls="downloads" aria-selected="true">Downloads</a>
                                <a class="nav-link" data-toggle="pill" role="tab" href="#addresses"
                                    aria-controls="addresses" aria-selected="true">Addresses</a>
                                <a class="nav-link" data-toggle="pill" role="tab" href="#accountdetails"
                                    aria-controls="accountdetails" aria-selected="true">Account Details</a>
                                <a class="nav-link" href="{{ route('customer.logout') }}">Logout</a>
                            </div>
                            <div class="user-dashboard-tab__content tab-content">
                                <div class="tab-pane fade show active" id="dashboard">
                                    <p>Hello <strong>{{ Auth::guard('customer')->user()->name }}</strong> (not
                                        <strong>{{ Auth::guard('customer')->user()->name }}</strong>? <a
                                            href="{{ route('customer.logout') }}">Log out</a>)</p>
                                    <p>From your account dashboard. you can easily check &amp; view your <a
                                            href="">recent orders</a>, manage your <a href="">shipping and
                                            billing
                                            addresses</a>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="orders">
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
                                                <tr>
                                                    <td>1</td>
                                                    <td class="wide-column">September 19, 2018</td>
                                                    <td>Processing</td>
                                                    <td class="wide-column">$49.00 for 1 item</td>
                                                    <td><a href="product-details.html"
                                                            class="btn btn-medium btn-style-1">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td class="wide-column">September 19, 2018</td>
                                                    <td>Processing</td>
                                                    <td class="wide-column">$49.00 for 1 item</td>
                                                    <td><a href="product-details.html"
                                                            class="btn btn-medium btn-style-1">View</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="downloads">
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
                                                <tr>
                                                    <td class="wide-column">Airi - Ecommerce Bootstrap Template</td>
                                                    <td>August 10, 2018 </td>
                                                    <td class="wide-column">Never</td>
                                                    <td><a href="#" class="btn btn-medium btn-style-1">Download
                                                            File</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="wide-column">Airi - Ecommerce Bootstrap Template</td>
                                                    <td>August 10, 2018 </td>
                                                    <td class="wide-column">Never</td>
                                                    <td><a href="#" class="btn btn-medium btn-style-1">Download
                                                            File</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="addresses">
                                    <p class="mb--20">The following addresses will be used on the checkout page by
                                        default.</p>
                                    <div class="row">
                                        <div class="col-md-6 mb-sm--20">
                                            <div class="text-block">
                                                <h4 class="mb--20">Billing address</h4>
                                                <a href="">Edit</a>
                                                <p>You have not set up this type of address yet.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-block">
                                                <h4 class="mb--20">Shopping address</h4>
                                                <a href="">Edit</a>
                                                <p>You have not set up this type of address yet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="accountdetails">
                                    <form action="#" class="form form--account">
                                        <div class="row grid-space-30 mb--20">
                                            <div class="col-md-6 mb-sm--20">
                                                <div class="form__group">
                                                    <label class="form__label" for="f_name">First name <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="f_name" id="f_name"
                                                        class="form__input">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form__group">
                                                    <label class="form__label" for="l_name">Last name <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="l_name" id="l_name"
                                                        class="form__input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb--20">
                                            <div class="col-12">
                                                <div class="form__group">
                                                    <label class="form__label" for="d_name">Display name <span
                                                            class="required">*</span></label>
                                                    <input type="text" name="d_name" id="d_name"
                                                        class="form__input">
                                                    <span class="suggestion"><em>This will be how your name will be
                                                            displayed in the account section and in
                                                            reviews</em></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb--20">
                                            <div class="col-12">
                                                <div class="form__group">
                                                    <label class="form__label" for="email">Email Address <span
                                                            class="required">*</span></label>
                                                    <input type="email" name="email" id="email"
                                                        class="form__input">
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
                                                        <input type="password" name="cur_pass" id="cur_pass"
                                                            class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label class="form__label" for="new_pass">New password
                                                            (leave blank to leave unchanged)</label>
                                                        <input type="password" name="new_pass" id="new_pass"
                                                            class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label class="form__label" for="conf_new_pass">Confirm new
                                                            password</label>
                                                        <input type="password" name="conf_new_pass" id="conf_new_pass"
                                                            class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form__group">
                                                    <input type="submit" value="Save Changes"
                                                        class="btn btn-style-1 btn-submit">
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
