@extends('layouts.backend_master')
@section('title')
    Variation
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Color List</h3>
                </div>
                <div class="card-body">
                    @if (session('color_delete'))
                        <div class="alert alert-success">{{ session('color_delete') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Color Name</th>
                            <th>Color Code</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($colors as $color)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $color->color_name }}</td>
                                <td>{{ $color->color_code }}</td>
                                <td>
                                    <a href="{{ route('color.delete', $color->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger">No Colors Available</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Size List</h3>
                </div>
                <div class="card-body">
                    @if (session('size_delete'))
                        <div class="alert alert-success">{{ session('size_delete') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Size Name</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($sizes as $size)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $size->size_name }}</td>
                                <td>
                                    <a href="{{ route('size.delete', $size->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger">No Sizes Available</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Color</h3>
                </div>
                <div class="card-body">
                    @if (session('add_color'))
                        <div class="alert alert-success">{{ session('add_color') }}</div>
                    @endif
                    @if (session('color_exists'))
                        <div class="alert alert-danger">{{ session('color_exists') }}</div>
                    @endif
                    <form action="{{ route('color.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Color Name</label>
                            <input type="text" class="form-control" name="color_name">
                            @error('color_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Color Code</label>
                            <input type="text" class="form-control" name="color_code">
                            @error('color_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Color</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Add Size</h3>
                </div>
                <div class="card-body">
                    @if (session('add_size'))
                        <div class="alert alert-success">{{ session('add_size') }}</div>
                    @endif
                    @if (session('size_exists'))
                        <div class="alert alert-danger">{{ session('size_exists') }}</div>
                    @endif
                    <form action="{{ route('size.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Size Name</label>
                            <input type="text" class="form-control" name="size_name">
                            @error('size_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Size</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
