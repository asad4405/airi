@extends('layouts.backend_master')
@section('title')
    Coupon
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Coupon List</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Coupon Name</th>
                            <th>Amount</th>
                            <th>Validity</th>
                            <th>Limit</th>
                            <th>Highest Amount</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($coupons as $coupon)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $coupon->name }}</td>
                                <td>{{ $coupon->amount }}</td>
                                <td>{{ $coupon->validity }}</td>
                                <td>{{ $coupon->limit }}</td>
                                <td>{{ $coupon->highest_amount }}</td>
                                <td>
                                    @can('Coupon Edit Permission')
                                        <a href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-info">Edit</a>
                                    @endcan
                                    @can('Coupon Delete Permission')
                                        <a href="{{ route('coupon.delete', $coupon->id) }}" class="btn btn-danger">Delete</a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-danger">No Coupon Available!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        @can('Coupon Add Permission')
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Coupon</h3>
                    </div>
                    <div class="card-body">
                        @if (session('coupon_add'))
                            <div class="alert alert-success">{{ session('coupon_add') }}</div>
                        @endif
                        <form action="{{ route('coupon.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Coupon Name</label>
                                <input type="text" class="form-control" name="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Coupon Amount (%)</label>
                                <input type="text" class="form-control" name="amount">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Coupon Validity</label>
                                <input type="date" class="form-control" name="validity">
                                @error('validity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Coupon Limit</label>
                                <input type="text" class="form-control" name="limit">
                                @error('limit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Highest Amount</label>
                                <input type="text" class="form-control" name="highest_amount">
                                @error('highest_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
