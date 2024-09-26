@extends('layouts.backend_master')
@section('title')
    Banner
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Banner List</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Heading</th>
                            <th>Image</th>
                            <th>Offer Image</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($banners as $banner)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $banner->heading_banner }}</td>
                                <td>
                                    <img src="{{ asset('uploads/banner/banner_img') }}/{{ $banner->banner_img }}"
                                        alt="">
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/banner/offer_img') }}/{{ $banner->offer_img }}"
                                        alt="">
                                </td>
                                <td>
                                    <a href="{{ route('banner.delete', $banner->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger">No Banners Available!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Banner</h3>
                </div>
                <div class="card-body">
                    @if (session('banner_success'))
                        <div class="alert alert-success">{{ session('banner_success') }}</div>
                    @endif
                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Heading Banner</label>
                            <input type="text" class="form-control" name="heading_banner">
                            @error('heading_banner')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Banner Image</label>
                            <input type="file" class="form-control" name="banner_img">
                            @error('banner_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Offer Image</label>
                            <input type="file" class="form-control" name="offer_img">
                            @error('offer_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Button Link</label>
                            <input type="text" class="form-control" name="btn_link">
                            @error('btn_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
