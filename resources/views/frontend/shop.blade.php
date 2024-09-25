@extends('layouts.frontend_master')
@section('title')
    Shop
@endsection
@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center col-12">
                    <h1 class="page-title">Shop Sidebar</h1>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li class="current"><span>Shop Pages</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="page-content-inner enable-page-sidebar">
            <div class="container-fluid">
                <div class="row shop-sidebar pt--45 pt-md--35 pt-sm--20 pb--60 pb-md--50 pb-sm--40">
                    <div class="col-lg-9 order-lg-2" id="main-content">
                        <div class="shop-toolbar">
                            <div class="shop-toolbar__inner">
                                <div class="row align-items-center">
                                    <div class="text-center col-md-6 text-md-start mb-sm--20">
                                        <div class="shop-toolbar__left">
                                            <p class="product-pages">Showing 1–20 of 42 results</p>
                                            <div class="product-view-count">
                                                <p>Show</p>
                                                <ul>
                                                    <li><a href="shop-sidebar.html">6</a></li>
                                                    <li class="active"><a href="shop-sidebar.html">12</a></li>
                                                    <li><a href="shop-sidebar.html">15</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="shop-toolbar__right">
                                            <a href="#" class="product-filter-btn shop-toolbar__btn">
                                                <span>Filters</span>
                                                <i></i>
                                            </a>
                                            <div class="product-ordering">
                                                <a href="" class="product-ordering__btn shop-toolbar__btn">
                                                    <span>Short By</span>
                                                    <i></i>
                                                </a>
                                                <ul class="product-ordering__list">
                                                    <li class="active"><a href="#">Sort by popularity</a></li>
                                                    <li><a href="#">Sort by average rating</a></li>
                                                    <li><a href="#">Sort by newness</a></li>
                                                    <li><a href="#">Sort by price: low to high</a></li>
                                                    <li><a href="#">Sort by price: high to low</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="advanced-product-filters">
                                <div class="product-filter">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="product-widget product-widget--price">
                                                <h3 class="widget-title">Price</h3>
                                                <ul class="product-widget__list">
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$20.00</span>
                                                            <span> - </span>
                                                            <span class="ammount">$40.00</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$40.00</span>
                                                            <span> - </span>
                                                            <span class="ammount">$50.00</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$50.00</span>
                                                            <span> - </span>
                                                            <span class="ammount">$60.00</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$60.00</span>
                                                            <span> - </span>
                                                            <span class="ammount">$80.00</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$80.00</span>
                                                            <span> - </span>
                                                            <span class="ammount">$100.00</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$100.00</span>
                                                            <span> + </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class="btn-close"><i class="dl-icon-close"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="shop-products">
                            <div class="row grid-space-20 xxl-block-grid-4">
                                @forelse ($products as $product)
                                    <div class="col-lg-4 col-sm-6 mb--40 mb-md--30">
                                        <div class="airi-product">
                                            <div class="product-inner">
                                                <figure class="product-image">
                                                    <div class="product-image--holder">
                                                        <a href="{{ route('product.details', $product->slug) }}">
                                                            <img src="{{ asset('uploads/product') }}/{{ $product->preview }}"
                                                                alt="Product Image" class="primary-image">
                                                            <img src="{{ asset('uploads/product') }}/{{ $product->preview }}"
                                                                alt="Product Image" class="secondary-image">
                                                        </a>
                                                    </div>
                                                    <div class="airi-product-action">
                                                        <div class="product-action">
                                                            <a class="quickview-btn action-btn" data-bs-toggle="tooltip"
                                                                data-bs-placement="left" title="Quick Shop">
                                                                <span data-bs-toggle="modal" data-bs-target="#productModal">
                                                                    <i class="dl-icon-view"></i>
                                                                </span>
                                                            </a>
                                                            <a class="add_to_cart_btn action-btn" href="cart.html"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="Add to Cart">
                                                                <i class="dl-icon-cart29"></i>
                                                            </a>
                                                            <a class="add_wishlist action-btn" href="wishlist.html"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="Add to Wishlist">
                                                                <i class="dl-icon-heart4"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </figure>
                                                <div class="text-center product-info">
                                                    <h3 class="product-title">
                                                        <a
                                                            href="{{ route('product.details', $product->slug) }}">{{ $product->product_name }}</a>
                                                    </h3>
                                                    <span class="product-price-wrapper">
                                                        <span class="money">{{ $product->after_discount }} Taka</span>
                                                        @if ($product->discount)
                                                            <span class="product-price-old">
                                                                <span class="money">{{ $product->product_price }}
                                                                    Taka</span>
                                                            </span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <nav class="pagination-wrap">
                            <ul class="pagination">
                                <li><a href="shop-sidebar.html" class="prev page-number"><i
                                            class="fa fa-angle-double-left"></i></a></li>
                                <li><span class="current page-number">1</span></li>
                                <li><a href="shop-sidebar.html" class="page-number">2</a></li>
                                <li><a href="shop-sidebar.html" class="page-number">3</a></li>
                                <li><a href="shop-sidebar.html" class="next page-number"><i
                                            class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 order-lg-1 mt--30 mt-md--40" id="primary-sidebar">
                        <div class="sidebar-widget">
                            <!-- Category Widget Start -->
                            <div class="product-widget categroy-widget mb--35 mb-md--30">
                                <h3 class="widget-title">Categories</h3>
                                <ul class="prouduct-categories product-widget__list">
                                    @foreach ($categories as $category)
                                        <li><a href="">{{ $category->category_name }}</a><span
                                                class="count">({{ $category->count() }})</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Category Widget Start -->

                            <!-- Price Filter Widget Start -->
                            <div class="product-widget product-price-widget mb--40 mb-md--35">
                                <h3 class="widget-title">Price</h3>
                                <div class="widget_content">
                                    <form action="#" method="post">
                                        <div id="slider-range"
                                            class="price-slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"
                                                style="left: 16.6667%; width: 79.1667%;">

                                            </div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                                style="left: 16.6667%;">

                                            </span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                                style="left: 95.8333%;">

                                            </span>
                                        </div>
                                        <div class="filter-price">
                                            <div class="filter-price__count">
                                                <div class="filter-price__input-group mb--20">
                                                    <span>Price: </span>
                                                    <input type="text" id="amount" class="amount-range"
                                                        readonly="">
                                                </div>
                                                <button type="submit" class="btn btn-style-1 sidebar-btn">
                                                    filter
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Price Filter Widget End -->

                            <!-- Product Brand Widget Start -->
                            <div class="product-widget product-widget--brand mb--40 mb-md--30">
                                <h3 class="widget-title">Brands</h3>
                                <ul class="product-widget__list">
                                    <li><a href="shop-sidebar.html">Airi</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">Mango</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">Valention</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">Zara</a><span class="count">(2)</span></li>
                                </ul>
                            </div>
                            <!-- Product Brand Widget End -->

                            <!-- Category Widget Start -->
                            <div class="product-widget tag-widget mb--35 mb-md--30">
                                <h3 class="widget-title">Categories</h3>
                                <div class="tagcloud">
                                    <a href="shop-sidebar.html">chair</a>
                                    <a href="shop-sidebar.html">deco</a>
                                    <a href="shop-sidebar.html">dress</a>
                                    <a href="shop-sidebar.html">fashion</a>
                                    <a href="shop-sidebar.html">furniture</a>
                                    <a href="shop-sidebar.html">light</a>
                                    <a href="shop-sidebar.html">living</a>
                                    <a href="shop-sidebar.html">sofa</a>
                                    <a href="shop-sidebar.html">table</a>
                                    <a href="shop-sidebar.html">women</a>
                                </div>
                            </div>
                            <!-- Category Widget Start -->

                            <!-- Promo Widget Start -->
                            <div class="product-widget promo-widget">
                                <div class="banner-box banner-type-3 banner-type-3-2 banner-hover-1">
                                    <div class="banner-inner">
                                        <div class="banner-image">
                                            <img src="{{ asset('frontend/assets') }}/img/banner/ad-banner.jpg"
                                                alt="Banner">
                                        </div>
                                        <div class="banner-info">
                                            <h2 class="banner-title-11">New <br> <strong>Season</strong></h2>
                                        </div>
                                        <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Promo Widget End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
@section('footer_script')
    <script>
        $('.search_btn').click(function() {
            var search = $('#search').val();
            var link = "{{ route('shop') }}" + "?search=" + search;
            window.location.href = link;
        });
    </script>
@endsection
