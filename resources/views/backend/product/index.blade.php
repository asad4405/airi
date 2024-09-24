@extends('layouts.backend_master')
@section('title')
    Product
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Product List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Product Photo</th>
                            <th>Product Price</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td><img src="{{ asset('uploads/product') }}/{{ $product->preview }}" alt=""></td>
                                <td>{{ $product->after_discount }} Taka</td>
                                <td>
                                    @can('Inventory Permission')
                                        <a href="{{ route('inventory.index', $product->id) }}" class="btn btn-info">Add Stock</a>
                                    @endcan
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
