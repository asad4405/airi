<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Airi - Login</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('backend/assets') }}/images/favicon.png" />
</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="mx-0 row w-100 auth-page">
                    <div class="mx-auto col-md-8 col-xl-6">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper">

                                    </div>
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="px-4 py-5 auth-form-wrapper">
                                        <a href="#" class="mb-2 noble-ui-logo d-block">Noble<span>UI</span></a>
                                        <h5 class="mb-4 text-muted font-weight-normal">Welcome back! Log in to your
                                            account.</h5>
                                        <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" name="password"
                                                    autocomplete="current-password" placeholder="Password">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-check form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="remember">
                                                    Remember me
                                                </label>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit"
                                                    class="mb-2 mr-2 text-white btn btn-primary mb-md-0">Login</button>
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
    </div>

    <!-- core:js -->
    <script src="{{ asset('backend/assets') }}/vendors/core/core.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('backend/assets') }}/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('backend/assets') }}/js/template.js"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <!-- end custom js for this page -->
</body>

</html>
