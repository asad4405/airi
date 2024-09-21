@extends('layouts.frontend_master')
@section('title')
    Order Success
@endsection
@if (session('success'))
    <!-- Breadcrumb area Start -->
    @section('content')
        <div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Order Success</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li class="current"><span>Order Success</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb area End -->
        <div class="my-5 container">
            <div class="row">
                <div class="m-auto col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="fw-bold text-center text-info">Your Order has been Successfull!</h3>
                            <h3 class="fw-bold">Order ID: {{ session('success') }}</h3>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('frontend/assets/img/order.jpeg') }}" alt="" width="800">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@else
    @php
        abort('404');
    @endphp
@endif
