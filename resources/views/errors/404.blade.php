@extends('layouts.frontend_master')
@section('title')
    404 error
@endsection
@section('content')
    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="page-content-inner">
            <div class="container">
                <div class="row justify-content-center ptb--100">
                    <div class="text-center col-lg-8">
                        <div class="error-text">
                            <img src="{{ asset('frontend/assets') }}/img/others/404-img.png" alt="404">
                            <h2 class="error-heading mt--20">Page cannot be found!</h2>
                            <p class="mb--40">It looks like nothing was found at this locations.</p>
                            <a href="{{ route('index') }}" class="btn btn-color-gray btn-medium btn-bordered btn-style-1">Back to
                                home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
