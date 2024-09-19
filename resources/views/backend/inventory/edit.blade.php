@extends('layouts.backend_master')
@section('title')
    Edit Inventory
@endsection
@section('content')
    <div class="row">
        <div class="m-auto col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Inventory</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_id"
                                value="{{ $inventory->product->product_name }}" disabled>
                            @error('product_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Product Quantity</label>
                            <input type="text" class="form-control" name="quantity" value="{{ $inventory->quantity }}">
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Inventory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
