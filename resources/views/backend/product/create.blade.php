@extends('layouts.backend_master')
@can('Product Add Permission')

    @section('title')
        Add Product
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Product</h3>
                    </div>
                    <div class="card-body">
                        @if (session('add_product'))
                            <div class="alert alert-success">{{ session('add_product') }}</div>
                        @endif
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Category Name</label>
                                        <select name="category_id" class="form-select">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Subcategory Name</label>
                                        <select name="subcategory_id" class="form-select">
                                            <option value="">Select Subcategory</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="product_name">
                                    </div>
                                    @error('product_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Product Price</label>
                                        <input type="text" class="form-control" name="product_price">
                                    </div>
                                    @error('product_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Product Discount (%)</label>
                                        <input type="text" class="form-control" name="discount">
                                    </div>
                                    @error('discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tags</label>
                                        <select name="tags" class="form-select">
                                            <option value="">Select Tag</option>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('tags')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Short Description</label>
                                        <textarea name="short_desp" rows="4" class="form-control"></textarea>
                                    </div>
                                    @error('short_desp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Long Description</label>
                                        <textarea name="long_desp" rows="6" class="form-control"></textarea>
                                    </div>
                                    @error('long_desp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Additional Info</label>
                                        <textarea name="addi_info" rows="6" class="form-control"></textarea>
                                    </div>
                                    @error('addi_info')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Additional Info</label>
                                        <input type="file" class="form-control" name="preview">
                                    </div>
                                    @error('preview')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Product Gallery</label>
                                        <input type="file" class="form-control" name="product_gallery[]" multiple>
                                    </div>
                                    @error('')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
