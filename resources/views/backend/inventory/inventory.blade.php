@extends('layouts.backend_master')
@section('title')
    Inventory
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Inventory List</h3>
                </div>
                <div class="card-body">
                    @if (session('inventory_delete'))
                        <div class="alert alert-success">{{ session('inventory_delete') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($inventories as $inventory)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $inventory->color_id }}</td>
                                <td>{{ $inventory->size_id }}</td>
                                <td>{{ $inventory->quantity }}</td>
                                <td>
                                    <a href="{{ route('inventory.delete', $inventory->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger">No Inventory Available!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Inventory</h3>
                </div>
                <div class="card-body">
                    @if (session('add_inventory'))
                        <div class="alert alert-success">{{ session('add_inventory') }}</div>
                    @endif
                    <form action="{{ route('inventory.store', $product->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_id"
                                value="{{ $product->product_name }}" disabled>
                            @error('product_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Color Name</label>
                            <select name="color_id" class="form-select">
                                <option value="">Select Color</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                @endforeach
                            </select>
                            @error('color_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Size Name</label>
                            <select name="size_id" class="form-select">
                                <option value="">Select Size</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                @endforeach
                            </select>
                            @error('size_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Product Quantity</label>
                            <input type="text" class="form-control" name="quantity">
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Inventory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
