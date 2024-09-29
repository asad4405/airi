@extends('layouts.frontend_master')
@section('title')
    Wishlist
@endsection
@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg--white-6 ptb--70 ptb-lg--40">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center col-12">
                    <h1 class="page-title">Wishilist</h1>
                    <ul class="breadcrumb justify-content-center">
                        {{ Breadcrumbs::render('wishlist') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="page-content-inner">
            <div class="container">
                <div class="row pt--80 pt-md--60 pt-sm--40 pb--65 pb-md--45 pb-sm--25">
                    <div class="col-12" id="main-content">
                        <div class="table-content table-responsive">
                            <table class="table text-center table-style-2 wishlist-table">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Image</th>
                                        <th class="text-start">Product</th>
                                        <th>Stock Status</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($wishlists as $wishlist)
                                        <tr>
                                            <td class="product-remove text-start"><a
                                                    href="{{ route('wishlist.delete', $wishlist->id) }}"><i
                                                        class="dl-icon-close"></i></a></td>
                                            <td class="product-thumbnail text-start">
                                                <img src="{{ asset('uploads/product') }}/{{ $wishlist->product->preview }}"
                                                    alt="Product Thumnail">
                                            </td>
                                            <td class="product-name text-start wide-column">
                                                <h3>
                                                    <a
                                                        href="{{ route('product.details', $wishlist->product->slug) }}">{{ $wishlist->product->product_name }}</a>
                                                </h3>
                                            </td>
                                            @php
                                                $inventory = App\Models\Inventory::where(
                                                    'product_id',
                                                    $wishlist->product->id,
                                                )->first();
                                            @endphp
                                            @if ($inventory)
                                                @if ($inventory->quantity > 0)
                                                    <td class="product-stock">
                                                        In Stock
                                                    </td>
                                                @else
                                                    <td class="product-stock">
                                                        Stock Out
                                                    </td>
                                                @endif
                                            @else
                                                <td class="product-stock">
                                                    Upcomming
                                                </td>
                                            @endif

                                            <td class="product-price">
                                                <span class="product-price-wrapper">
                                                    <span class="money">{{ $wishlist->product->after_discount }}
                                                        Taka</span>
                                                </span>
                                            </td>
                                            <td class="product-action-btn">
                                                <a class="btn btn-primary" href="{{ route('product.details',$wishlist->product->slug) }}">View Product</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-danger">No Product Available!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
