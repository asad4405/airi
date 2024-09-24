@extends('layouts.backend_master')
@section('title')
    Category
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Category List</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td><img src="{{ asset('uploads/category') }}/{{ $category->image }}" alt=""></td>
                                <td>
                                    @can('Category Edit Permission')
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info">Edit</a>
                                    @endcan
                                    @can('Category Delete Permission')
                                        <a href="{{ route('category.delete', $category->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger">No Category Available!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        @can('Category Add Permission')
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Category</h3>
                    </div>
                    <div class="card-body">
                        @if (session('add_category'))
                            <div class="alert alert-success">{{ session('add_category') }}</div>
                        @endif
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
