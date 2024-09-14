@extends('layouts.backend_master')
@section('title')
    Subcategory
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Subcategory List</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="my-2 col-lg-6">
                                <div class="card-header">
                                    <h3>{{ $category->category_name }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="card-body">
                                        @if (session('subcategory_delete'))
                                            <div class="alert alert-success">{{ session('subcategory_delete') }}</div>
                                        @endif
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Subcategory Name</th>
                                                <th>Action</th>
                                            </tr>
                                            @forelse (App\Models\Subcategory::where('category_id',$category->id)->get() as $subcategory)
                                                <tr>
                                                    <td>{{ $subcategory->subcategory_name }}</td>
                                                    <td>
                                                        <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <form action="{{ route('subcategory.destroy',$subcategory->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-danger">No Category
                                                        Available!</td>
                                                </tr>
                                            @endforelse
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Subcategory</h3>
                </div>
                <div class="card-body">
                    @if (session('add_subcategory'))
                        <div class="alert alert-success">{{ session('add_subcategory') }}</div>
                    @endif
                    <form action="{{ route('subcategory.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Category Name</label>
                            <select name="category_id" class="form-select">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Subcategory Name</label>
                            <input type="text" class="form-control" name="subcategory_name">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Subcategory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
