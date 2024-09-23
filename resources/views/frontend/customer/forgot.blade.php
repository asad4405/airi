@extends('layouts.frontend_master')
@section('title')
    Forgot Password
@endsection
@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center col-12">
                    <h1 class="page-title">Forgot Password</h1>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li class="current"><span>Forgot Password</span></li>
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
                <div class="row pt--75 pt-md--55 pt-sm--35 pb--80 pb-md--60 pb-sm--40">
                    <div class="m-auto col-md-6 mb-sm--30">
                        <div class="login-box">
                            <h4 class="mb--35 mb-sm--20">Forgot Password</h4>
                            <form class="form form--login" action="{{ route('password.forgot.post') }}" method="POST">
                                @csrf
                                <div class="form__group mb--20">
                                    <label class="form__label form__label--2" for="">
                                        Email <span class="required">*</span></label>
                                    <input type="email" class="form__input form__input--3" name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if (session('exists'))
                                        <span class="text-danger">{{ session('exists') }}</span>
                                    @endif
                                </div>
                                <div class="d-flex align-items-center mb--20">
                                    <div class="form__group">
                                        <button type="submit" class="btn btn-submit btn-style-1">Password Reset</button>
                                    </div>
                                </div>
                                <a class="forgot-pass" href="{{ route('customer.login') }}">Login your account?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
