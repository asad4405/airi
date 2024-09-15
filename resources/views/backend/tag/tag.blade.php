@extends('layouts.backend_master')
@section('title')
    Tag
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Tag List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Tag Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $tag->tag_name }}</td>
                                <td>
                                    <a href="{{ route('tag.delete', $tag->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Tag</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('tag.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Tag Name</label>
                            <input type="text" class="form-control" name="tag_name">
                            @error('tag_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Tag</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
