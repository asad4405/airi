@extends('layouts.backend_master')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit User</h3>
                </div>
                <div class="card-body">
                    @if (session('user_update'))
                        <div class="alert alert-success">{{ session('user_update') }}</div>
                    @endif
                    <form action="{{ route('user.update.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Edit Password</h3>
                </div>
                <div class="card-body">
                    @if (session('pass_success'))
                        <div class="alert alert-success">{{ session('pass_success') }}</div>
                    @endif

                    <form action="{{ route('user.password.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="current_password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if (session('pass_wrong'))
                                <span class="text-danger">{{ session('pass_wrong') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Edit Photo</h3>
                </div>
                <div class="card-body">
                    @if (session('pass_success'))
                        <div class="alert alert-success">{{ session('pass_success') }}</div>
                    @endif

                    <form action="{{ route('user.photo.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Photo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
