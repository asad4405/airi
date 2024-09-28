@extends('layouts.frontend_master')
@section('title')
    Product Details
@endsection
@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area pt--70 pt-md--25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="shop-sidebar.html">Shop Pages</a></li>
                        <li class="current"><span>Product Details</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="page-content-inner enable-full-width">
            <div class="container-fluid">
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <div class="row pt--40">
                        <div class="col-md-6 product-main-image">
                            <div class="product-image">
                                <div class="product-gallery vertical-slide-nav">
                                    <div class="product-gallery__thumb">
                                        <div class="product-gallery__thumb--image">
                                            <div class="airi-element-carousel nav-slider slick-vertical"
                                                data-slick-options='{
                                                "slidesToShow": 3,
                                                "slidesToScroll": 1,
                                                "vertical": true,
                                                "swipe": true,
                                                "verticalSwiping": true,
                                                "infinite": true,
                                                "focusOnSelect": true,
                                                "asNavFor": ".main-slider",
                                                "arrows": true,
                                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-up" },
                                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-down" }
                                            }'
                                                data-slick-responsive='[
                                                {
                                                    "breakpoint":992,
                                                    "settings": {
                                                        "slidesToShow": 4,
                                                        "vertical": false,
                                                        "verticalSwiping": false
                                                    }
                                                },
                                                {
                                                    "breakpoint":575,
                                                    "settings": {
                                                        "slidesToShow": 3,
                                                        "vertical": false,
                                                        "verticalSwiping": false
                                                    }
                                                },
                                                {
                                                    "breakpoint":480,
                                                    "settings": {
                                                        "slidesToShow": 2,
                                                        "vertical": false,
                                                        "verticalSwiping": false
                                                    }
                                                }
                                            ]'>
                                                @foreach (App\Models\Product_gallery::where('product_id', $product->id)->get() as $product_gallery)
                                                    <figure class="product-gallery__thumb--single">
                                                        <img src="{{ asset('uploads/product_gallery') }}/{{ $product_gallery->product_gallery }}"
                                                            alt="Products">
                                                    </figure>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-gallery__large-image">
                                        <div class="gallery-with-thumbs">
                                            <div class="product-gallery__wrapper">
                                                <div class="airi-element-carousel main-slider product-gallery__full-image image-popup"
                                                    data-slick-options='{
                                                    "slidesToShow": 1,
                                                    "slidesToScroll": 1,
                                                    "infinite": true,
                                                    "arrows": false,
                                                    "asNavFor": ".nav-slider"
                                                }'>


                                                    @foreach (App\Models\Product_gallery::where('product_id', $product->id)->get() as $product_gallery)
                                                        <figure class="product-gallery__image zoom">
                                                            <img src="{{ asset('uploads/product_gallery') }}/{{ $product_gallery->product_gallery }}"
                                                                alt="Product">
                                                        </figure>
                                                    @endforeach
                                                </div>
                                                <div class="product-gallery__actions">
                                                    <button class="action-btn btn-zoom-popup"><i
                                                            class="dl-icon-zoom-in"></i></button>
                                                    {{-- <a href="https://www.youtube.com/watch?v=Rp19QD2XIGM"
                                                    class="action-btn video-popup"><i class="dl-icon-format-video"></i></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($product->discount && $reviews->count() > 0)
                                    <span class="product-badge hot">Hot</span>
                                @elseif ($product->discount)
                                    <span class="product-badge sale">Sale</span>
                                @else
                                    <span class="product-badge new">New</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 product-main-details mt--40 mt-md--10 mt-sm--30">
                            <div class="product-summary">
                                <div class="float-left product-rating">
                                    <span>
                                        @if ($reviews->count())
                                            @for ($i = 1; $i <= $reviews->average('star'); $i++)
                                                <i class="dl-icon-star rated"></i>
                                            @endfor
                                            @for ($i = 1; $i <= 5 - $reviews->average('star'); $i++)
                                                <i class="fa fa-star-o rated"></i>
                                            @endfor
                                        @endif
                                    </span>
                                    @if ($reviews->count())
                                        <a href="" class="review-link">({{ $reviews->count() }} customer review)</a>
                                    @endif
                                </div>
                                <div class="product-navigation">
                                    <a href="#" class="prev"><i class="dl-icon-left"></i></a>
                                    <a href="#" class="next"><i class="dl-icon-right"></i></a>
                                </div>
                                <div class="clearfix"></div>
                                <h3 class="product-title">{{ $product->product_name }}</h3>
                                @php
                                    $inventory = App\Models\Inventory::where('product_id', $product->id)->first();
                                @endphp
                                @if ($inventory)
                                    @if ($inventory->quantity > 0)
                                        <span class="float-right product-stock in-stock">
                                            <i class="dl-icon-check-circle1"></i>
                                            In Stock
                                        </span>
                                    @else
                                        <span class="float-right product-stock in-stock">
                                            <i class="dl-icon-check-circle1"></i>
                                            Stock Out
                                        </span>
                                    @endif
                                @else
                                    <span class="float-right product-stock in-stock">
                                        <i class="dl-icon-check-circle1"></i>
                                        Upcomming
                                    </span>
                                @endif
                                <div class="product-price-wrapper mb--40 mb-md--10">
                                    <span class="money">{{ $product->after_discount }} Taka</span>
                                    @if ($product->after_discount)
                                        <span class="old-price">
                                            <span class="money">{{ $product->product_price }} Taka</span>
                                        </span>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                                <p class="product-short-description mb--45 mb-sm--20">{{ $product->short_desp }}</p>
                                <div class="form--action mb--30 mb-sm--20">
                                    <div class="flex-row product-action align-items-center">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="quantity">
                                            <input type="number" class="quantity-input" name="quantity" value="1"
                                                min="1">
                                        </div>
                                        @auth('customer')
                                            @php
                                                $inventory = App\Models\Inventory::where(
                                                    'product_id',
                                                    $product->id,
                                                )->first();
                                            @endphp
                                            @if ($inventory)
                                                @if ($inventory->quantity > 0)
                                                    <button type="submit" class="btn btn-style-1 btn-large add-to-cart">
                                                        Add To Cart
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="btn bg-danger btn-style-1 btn-large add-to-cart">
                                                        Stock Out
                                                    </button>
                                                @endif
                                            @else
                                                <button type="button" class="btn btn-style-1 bg-info btn-large add-to-cart">
                                                    Upcomming
                                                </button>
                                            @endif
                                        @else
                                            <button type="button" onclick="location.href = '{{ route('customer.login') }}';"
                                                class="btn btn-style-1 btn-large add-to-cart">
                                                Loin your Account
                                            </button>
                                        @endauth
                                        <a href="wishlist.html"><i class="dl-icon-heart2"></i></a>
                                    </div>
                                </div>
                                <div class="product-summary-footer d-flex justify-content-between flex-sm-row flex-column">
                                    <div class="product-meta">
                                        <span class="sku_wrapper font-size-12">SKU: <span class="sku">REF.
                                                LA-887</span></span>
                                        <span class="posted_in font-size-12">Categories:
                                            <a href="shop-sidebar.html">Fashions</a>
                                        </span>
                                        <span class="posted_in font-size-12">Tags:
                                            <a href="shop-sidebar.html">dress,</a>
                                            <a href="shop-sidebar.html">fashions,</a>
                                            <a href="shop-sidebar.html">women</a>
                                        </span>
                                    </div>
                                    <div class="product-share-box">
                                        <span class="font-size-12">Share With</span>
                                        <!-- Social Icons Start Here -->
                                        <ul class="social social-small">
                                            <li class="social__item">
                                                <a href="https://facebook.com" class="social__link">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="social__item">
                                                <a href="https://twitter.com" class="social__link">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="social__item">
                                                <a href="https://plus.google.com" class="social__link">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                            <li class="social__item">
                                                <a href="https://plus.google.com" class="social__link">
                                                    <i class="fa fa-pinterest-p"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Social Icons End Here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="row justify-content-center pt--45 pt-lg--50 pt-md--55 pt-sm--35">
                <div class="col-12">
                    <div class="product-data-tab tab-style-1">
                        <div class="nav nav-tabs product-data-tab__head mb--40 mb-md--30" id="product-tab"
                            role="tablist">
                            <button type="button" class="product-data-tab__link nav-link active"
                                id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description"
                                role="tab" aria-selected="true">
                                <span>Description</span>
                            </button>
                            <button type="button" class="product-data-tab__link nav-link" id="nav-reviews-tab"
                                data-bs-toggle="tab" data-bs-target="#nav-reviews" role="tab" aria-selected="true">
                                <span>Reviews({{ $reviews->count() }})</span>
                            </button>
                        </div>
                        <div class="tab-content product-data-tab__content" id="product-tabContent">
                            <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                aria-labelledby="nav-description-tab">
                                <div class="product-description">
                                    {{ $product->long_desp }}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-reviews" role="tabpanel"
                                aria-labelledby="nav-reviews-tab">
                                <div class="product-reviews">
                                    <h3 class="review__title">{{ $reviews->count() }} review for
                                        {{ $product->product_name }}</h3>
                                    @if (session('review'))
                                        <div class="alert alert-success">{{ session('review') }}</div>
                                    @endif
                                    <ul class="review__list">
                                        @forelse($reviews as $review)
                                            <li class="review__item">
                                                <div class="review__container">
                                                    @if ($review->customer->photo)
                                                        <img src="{{ asset('uploads/customer') }}/{{ $review->customer->photo }}"
                                                            alt="Review Avatar" class="review__avatar">
                                                    @else
                                                        <img src="{{ Avatar::create($review->customer->name)->toBase64() }}"
                                                            class="review__avatar" />
                                                    @endif
                                                    <div class="review__text">
                                                        <div class="float-right product-rating">
                                                            <span>
                                                                @for ($i = 1; $i <= $review->star; $i++)
                                                                    <i class="dl-icon-star rated"></i>
                                                                @endfor
                                                                @for ($i = 1; $i <= 5 - $review->star; $i++)
                                                                    <i class="fa fa-star-o rated"></i>
                                                                @endfor
                                                            </span>
                                                        </div>
                                                        <div class="review__meta">
                                                            <strong
                                                                class="review__author">{{ $review->customer->name }}</strong>
                                                            <span class="review__dash">-</span>
                                                            <span
                                                                class="review__published-date">{{ $review->updated_at->format('F d') }},
                                                                {{ $review->updated_at->format('Y') }}</span>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <p class="review__description">{{ $review->review }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                    @auth('customer')
                                        @if (App\Models\OrderProduct::where('customer_id', Auth::guard('customer')->id())->where('product_id', $product->id)->exists())
                                            @if (App\Models\OrderProduct::where('customer_id', Auth::guard('customer')->id())->whereNotNull('review')->first() ==
                                                    false)
                                                <div class="review-form-wrapper">
                                                    <span class="reply-title"><strong>Add a review</strong></span>
                                                    <form action="{{ route('review.store', $product->id) }}" class="form"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-notes mb--20">
                                                            <p>Your email address will not be published. Required fields are
                                                                marked <span class="required">*</span></p>
                                                        </div>
                                                        <div class="form__group mb--30 mb-sm--20">
                                                            <div class="flex revew__rating">
                                                                <p class="stars selected">
                                                                    <input type="radio" name="star" value="1">
                                                                    <span class="star-1">1</span>
                                                                </p>
                                                                <p class="stars selected">
                                                                    <input type="radio" name="star" value="2">
                                                                    <span class="star-2">2</span>
                                                                </p>
                                                                <p class="stars selected">
                                                                    <input type="radio" name="star" value="3">
                                                                    <span class="star-3">3</span>
                                                                </p>
                                                                <p class="stars selected">
                                                                    <input type="radio" name="star" value="4">
                                                                    <span class="star-4">4</span>
                                                                </p>
                                                                <p class="stars selected">
                                                                    <input type="radio" name="star" value="5">
                                                                    <span class="star-5">5</span>
                                                                </p>

                                                                @error('star')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form__group mb--30 mb-sm--20">
                                                            <div class="row">
                                                                <div class="col-sm-6 mb-sm--20">
                                                                    <label class="form__label" for="name">Name<span
                                                                            class="required">*</span></label>
                                                                    <input type="text" name="" id="name"
                                                                        class="form__input"
                                                                        value="{{ Auth::guard('customer')->user()->name }}"
                                                                        disabled>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form__label" for="email">email<span
                                                                            class="required">*</span></label>
                                                                    <input type="email" name="" id="email"
                                                                        class="form__input"
                                                                        value="{{ Auth::guard('customer')->user()->email }}"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form__group mb--30 mb-sm--20">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label class="form__label" for="email">Your Review<span
                                                                            class="required">*</span></label>
                                                                    <textarea name="review" id="" class="form__input form__input--textarea"></textarea>
                                                                    @error('review')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form__group">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button type="submit"
                                                                        class="btn btn-style-1 btn-submit">Submit
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            @else
                                                <h3 class="alert alert-warning">You Already Review this Product</h3>
                                            @endif
                                        @else
                                            <h3 class="alert alert-warning">You did not purchase this product yet</h3>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt--35 pt-md--25 pt-sm--15 pb--75 pb-md--55 pb-sm--35">
                <div class="col-12">
                    <div class="row mb--40 mb-md--30">
                        <div class="text-center col-12">
                            <h2 class="heading-secondary">Related Products</h2>
                            <hr class="separator center mt--25 mt-md--15">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="airi-element-carousel product-carousel nav-vertical-center"
                                data-slick-options='{
                                    "spaceBetween": 30,
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "arrows": true,
                                    "prevArrow": "dl-icon-left",
                                    "nextArrow": "dl-icon-right"
                                    }'
                                data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":991, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":450, "settings": {"slidesToShow": 1} }
                                    ]'>
                                @forelse ($related_products as $related_product)
                                    <div class="airi-product">
                                        <div class="product-inner">
                                            <figure class="product-image">
                                                <div class="product-image--holder">
                                                    <a href="{{ route('product.details', $related_product->slug) }}">
                                                        <img src="{{ asset('uploads/product') }}/{{ $related_product->preview }}"
                                                            alt="Product Image" class="primary-image">
                                                        <img src="{{ asset('uploads/product') }}/{{ $related_product->preview }}"
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
                                                        <a class="add_compare action-btn" href="compare.html"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="Add to Compare">
                                                            <i class="dl-icon-compare"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </figure>
                                            <div class="text-center product-info">
                                                <h3 class="product-title">
                                                    <a
                                                        href="{{ route('product.details', $related_product->slug) }}">{{ $related_product->product_name }}</a>
                                                </h3>
                                                <span class="product-price-wrapper">
                                                    <span class="money">{{ $related_product->after_discount }}
                                                        Taka</span>
                                                    @if ($related_product->after_discount)
                                                        <span class="product-price-old">
                                                            <span class="money">{{ $related_product->product_price }}
                                                                Taka</span>
                                                    @endif
                                                </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
