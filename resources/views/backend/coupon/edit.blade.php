@extends('layouts.backend_master')
@can('Coupon Edit Permission')

    @section('title')
        Edit Coupon
    @endsection
    @section('content')
        <div class="m-auto col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Coupon</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('coupon.update', $coupon->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Coupon Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $coupon->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Coupon Amount (%)</label>
                            <input type="text" class="form-control" name="amount" value="{{ $coupon->amount }}">
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Coupon Validity</label>
                            <input type="date" class="form-control" name="validity" value="{{ $coupon->validity }}">
                            @error('validity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Coupon Limit</label>
                            <input type="text" class="form-control" name="limit" value="{{ $coupon->limit }}">
                            @error('limit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Highest Amount</label>
                            <input type="text" class="form-control" name="highest_amount"
                                value="{{ $coupon->highest_amount }}">
                            @error('highest_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Coupon</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
@endcan
