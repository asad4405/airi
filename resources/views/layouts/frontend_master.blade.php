<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets') }}/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets') }}/img/icon.png">

    <!-- Title -->
    <title>Airi - @yield('title')</title>

    <!-- ************************* CSS Files ************************* -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/bootstrap.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/font-awesome.min.css">

    <!-- dl Icon CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/dl-icon.css">

    <!-- All Plugins CSS  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/plugins.css">

    <!-- Revoulation CSS  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/revoulation.css">

    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/main.css">

    <!-- modernizr JS
    ============================================ -->
    <script src="{{ asset('frontend/assets') }}/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="ai-preloader active">
        <div class="ai-preloader-inner h-100 d-flex align-items-center justify-content-center">
            <div class="ai-child ai-bounce1"></div>
            <div class="ai-child ai-bounce2"></div>
            <div class="ai-child ai-bounce3"></div>
        </div>
    </div>

    <!-- Main Wrapper Start -->
    <div class="wrapper enable-header-transparent">
        <!-- Header Area Start -->
        <header class="header header-transparent header-fullwidth header-style-1">
            <div class="header-outer">
                <div class="header-inner fixed-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6">
                                <!-- Main Navigation Start Here -->
                                <nav class="main-navigation">
                                    <ul class="mainmenu">
                                        <li class="mainmenu__item menu-item-has-children megamenu-holder">
                                            <a href="{{ route('index') }}" class="mainmenu__link">
                                                <span class="mm-text">Home</span>
                                            </a>
                                        </li>
                                        <li class="mainmenu__item menu-item-has-children">
                                            <a href="shop-sidebar.html" class="mainmenu__link">
                                                <span class="mm-text">Shop</span>
                                                <span class="tip">Hot</span>
                                            </a>
                                        </li>
                                        <li class="mainmenu__item">
                                            <a href="shop-collections.html" class="mainmenu__link">
                                                <span class="mm-text">Collections</span>
                                            </a>
                                        </li>
                                        <li class="mainmenu__item menu-item-has-children has-children">
                                            <a href="#" class="mainmenu__link">
                                                <span class="mm-text">Pages</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="about-us.html">
                                                        <span class="mm-text">About Us</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="team.html">
                                                        <span class="mm-text">Our teams</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="contact-us.html">
                                                        <span class="mm-text">Contact us 1</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="contact-us-02.html">
                                                        <span class="mm-text">Contact us 2</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="404.html">
                                                        <span class="mm-text">404 page</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="faqs-page.html">
                                                        <span class="mm-text">FAQs page</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="coming-soon.html">
                                                        <span class="mm-text">Coming Soon</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mainmenu__item menu-item-has-children has-children">
                                            <a href="blog.html" class="mainmenu__link">
                                                <span class="mm-text">Blog</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li class="menu-item-has-children has-children">
                                                    <a href="#">
                                                        <span class="mm-text">Blog Grid</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="blog-02-columns.html">
                                                                <span class="mm-text">Blog 02 Columns</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-03-columns.html">
                                                                <span class="mm-text">Blog 03 Columns</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children has-children">
                                                    <a href="#">
                                                        <span class="mm-text">Blog List</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="blog.html">
                                                                <span class="mm-text">Blog Sidebar</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-standard.html">
                                                                <span class="mm-text">Blog Standard</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-no-sidebar.html">
                                                                <span class="mm-text">Blog No Sidebar</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="blog-masonary.html">
                                                        <span class="mm-text">Blog Masonary</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item-has-children has-children">
                                                    <a href="#">
                                                        <span class="mm-text">Blog Details</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="single-post.html">
                                                                <span class="mm-text">Single Post</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-post-sidebar.html">
                                                                <span class="mm-text">Single Post Sidebar</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mainmenu__item">
                                            <a href="shop-instagram.html" class="mainmenu__link">
                                                <span class="mm-text">New Look</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- Main Navigation End Here -->
                            </div>
                            <div class="col-lg-2 col-md-3 col-4 text-lg-center">
                                <!-- Logo Start Here -->
                                <a href="{{ route('index') }} " class="logo-box">
                                    <figure class="logo--normal">
                                        <img src="{{ asset('frontend/assets') }}/img/logo/logo.svg" alt="Logo" />
                                    </figure>
                                    <figure class="logo--transparency">
                                        <img src="{{ asset('frontend/assets') }}/img/logo/logo-white.png"
                                            alt="Logo" />
                                    </figure>
                                </a>
                                <!-- Logo End Here -->
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-9 col-8">
                                <!-- Header Toolbar Start Here -->
                                <ul class="header-toolbar text-end">
                                    <li class="header-toolbar__item d-none d-lg-block">
                                        <a href="#sideNav" class="toolbar-btn">
                                            <i class="dl-icon-menu2"></i>
                                        </a>
                                    </li>
                                    <li class="header-toolbar__item user-info-menu-btn">
                                        <a href="#">
                                            <i class="fa fa-user-circle-o"></i>
                                        </a>
                                        <ul class="user-info-menu">
                                            <li>
                                                <a href="my-account.html">My Account</a>
                                            </li>
                                            <li>
                                                <a href="cart.html">Shopping Cart</a>
                                            </li>
                                            <li>
                                                <a href="checkout.html">Check Out</a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html">Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="order-tracking.html">Order tracking</a>
                                            </li>
                                            <li>
                                                <a href="compare.html">compare</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="header-toolbar__item">
                                        <a href="#miniCart" class="mini-cart-btn toolbar-btn">
                                            <i class="dl-icon-cart4"></i>
                                            <sup class="mini-cart-count">2</sup>
                                        </a>
                                    </li>
                                    <li class="header-toolbar__item">
                                        <a href="#searchForm" class="search-btn toolbar-btn">
                                            <i class="dl-icon-search1"></i>
                                        </a>
                                    </li>
                                    <li class="header-toolbar__item d-lg-none">
                                        <a href="#" class="menu-btn"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-sticky-header-height"></div>
            </div>

        </header>
        <!-- Header Area End -->

        @yield('content')

        <!-- Footer Start -->
        <footer class="footer footer-1 bg--black ptb--40">
            <div class="footer-top pb--40 pb-md--30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-8 mb-md--30">
                            <div class="footer-widget">
                                <div class="textwidget">
                                    <img src="{{ asset('frontend/assets') }}/img/logo/logo-white.png" alt="Logo"
                                        class="mb--10">
                                    <p class="font-size-16 font-2 mb--20">Integer ut ligula quis lectus fringilla
                                        elementum porttitor sed est. Duis fringilla efficitur ligula sed lobortis.</p>
                                    <!-- Social Icons Start Here -->
                                    <ul class="social">
                                        <li class="social__item">
                                            <a href="https://twitter.com" class="social__link color--white">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="https://plus.google.com" class="social__link color--white">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="https://facebook.com" class="social__link color--white">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="https://youtube.com" class="social__link color--white">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="https://instagram.com" class="social__link color--white">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Social Icons End Here -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-md--30">
                            <div class="footer-widget">
                                <h3 class="widget-title">Company</h3>
                                <ul class="widget-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="">Our Services</a></li>
                                    <li><a href="">Affiliate Program</a></li>
                                    <li><a href="">Work for Airi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-sm--30">
                            <div class="footer-widget">
                                <h3 class="widget-title">USEFUL LINKS</h3>
                                <ul class="widget-menu">
                                    <li><a href="shop-collections.html">The Collections</a></li>
                                    <li><a href="">Size Guide</a></li>
                                    <li><a href="">Return Policiy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-sm--30">
                            <div class="footer-widget">
                                <h3 class="widget-title">SHOPPING</h3>
                                <ul class="widget-menu">
                                    <li><a href="shop-instagram.html">Look Book</a></li>
                                    <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                    <li><a href="shop-fullwidth.html">Shop Fullwidth</a></li>
                                    <li><a href="shop-no-gutter.html">Man & Woman</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="footer-widget">
                                <h4 class="widget-title">CONTACT INFO</h4>
                                <ul class="contact-info">
                                    <li class="contact-info__item">
                                        <i class="fa fa-phone"></i>
                                        <span><a href="tel:+012345 6788" class="contact-info__link">(+012) 345
                                                6788</a></span>
                                    </li>
                                    <li class="contact-info__item">
                                        <i class="fa fa-envelope"></i>
                                        <span><a href="mailto:demo@email.com"
                                                class="contact-info__link">demo@email.com</a></span>
                                    </li>
                                    <li class="contact-info__item">
                                        <i class="fa fa-map-marker"></i>
                                        <span>Example Address</span>
                                    </li>
                                </ul>
                                <div class="textwidget">
                                    <img src="{{ asset('frontend/assets') }}/img/others/payments.png" alt="Payment">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-middle pb--40 pb-md--30">
                <div class="container">
                    <div class="row method-box-wrapper">
                        <div class="col-lg-3 col-md-6 mb-md--10">
                            <div class="method-box">
                                <h4>FREESHIPPING WORLD WIDE</h4>
                                <p>Freeship over oder $100</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-md--10">
                            <div class="method-box">
                                <h4>30 DAYS MONEY BACK</h4>
                                <p>You can back money any times</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-sm--10">
                            <div class="method-box">
                                <h4>PROFESSIONAL SUPPORT 24/7</h4>
                                <p>demo@example.com</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="method-box">
                                <h4>100% SECURE CHECKOUT</h4>
                                <p>Protect buyer & clients</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-12">
                            <p class="copyright-text">&copy; AIRI 2021 MADE WITH <i class="fa fa-heart"></i> BY
                                HASTHEMES</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

        <!-- Search from Start -->
        <div class="searchform__popup" id="searchForm">
            <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
            <div class="searchform__body">
                <p>Start typing and press Enter to search</p>
                <form class="searchform">
                    <input type="text" name="search" id="search" class="searchform__input"
                        placeholder="Search Entire Store...">
                    <button type="submit" class="searchform__submit"><i class="dl-icon-search10"></i></button>
                </form>
            </div>
        </div>
        <!-- Search from End -->

        <!-- Side Navigation Start -->
        <aside class="side-navigation" id="sideNav">
            <div class="side-navigation-wrapper">
                <a href="" class="btn-close"><i class="dl-icon-close"></i></a>
                <div class="side-navigation-inner">
                    <div class="widget">
                        <ul class="sidenav-menu">
                            <li><a href="about-us.html">About Airi Shop</a></li>
                            <li><a href="about-us.html">Help Center</a></li>
                            <li><a href="shop-collections.html">Portfolio</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="shop-instagram.html">New Look</a></li>
                        </ul>
                    </div>
                    <div class="widget pt--30 pr--20">
                        <div class="text-widget">
                            <p>
                                <img src="{{ asset('frontend/assets') }}/img/others/payments.png" alt="payment">
                            </p>
                            <p>Pellentesque mollis nec orci id tincidunt. Sed mollis risus eu nisi aliquet, sit amet
                                fermentum justo dapibus.</p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget">
                            <p>
                                <a href="#">(+612) 2531 5600</a>
                                <a href="mailto:demo@example.com">demo@example.com</a>
                                PO Box 1622 Colins Street West
                            </p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget google-map-link">
                            <p>
                                <a href="https://www.google.com/maps" target="_blank">Google Maps</a>
                            </p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget">
                            <!-- Social Icons Start Here -->
                            <ul class="social social-small">
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
                                    <a href="https://facebook.com" class="social__link">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="https://youtube.com" class="social__link">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="https://instagram.com" class="social__link">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- Social Icons End Here -->
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget">
                            <p class="copyright-text">&copy; AIRI 2021 MADE WITH <i class="fa fa-heart"></i> BY
                                HASTHEMES</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Side Navigation End -->

        <!-- Mini Cart Start -->
        <aside class="mini-cart" id="miniCart">
            <div class="mini-cart-wrapper">
                <a href="" class="btn-close"><i class="dl-icon-close"></i></a>
                <div class="mini-cart-inner">
                    <h5 class="mini-cart__heading mb--40 mb-lg--30">Shopping Cart</h5>
                    <div class="mini-cart__content">
                        <ul class="mini-cart__list">
                            <li class="mini-cart__product">
                                <a href="#" class="remove-from-cart remove">
                                    <i class="dl-icon-close"></i>
                                </a>
                                <div class="mini-cart__product__image">
                                    <img src="{{ asset('frontend/assets') }}/img/products/prod-17-1-70x91.jpg"
                                        alt="products">
                                </div>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="product-details.html">Chain print
                                        bermuda
                                        shorts </a>
                                    <span class="mini-cart__product__quantity">1 x $49.00</span>
                                </div>
                            </li>
                            <li class="mini-cart__product">
                                <a href="#" class="remove-from-cart remove">
                                    <i class="dl-icon-close"></i>
                                </a>
                                <div class="mini-cart__product__image">
                                    <img src="{{ asset('frontend/assets') }}/img/products/prod-18-1-70x91.jpg"
                                        alt="products">
                                </div>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="product-details.html">Waxed-effect
                                        pleated skirt</a>
                                    <span class="mini-cart__product__quantity">1 x $49.00</span>
                                </div>
                            </li>
                            <li class="mini-cart__product">
                                <a href="#" class="remove-from-cart remove">
                                    <i class="dl-icon-close"></i>
                                </a>
                                <div class="mini-cart__product__image">
                                    <img src="{{ asset('frontend/assets') }}/img/products/prod-19-1-70x91.jpg"
                                        alt="products">
                                </div>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="product-details.html">Waxed-effect
                                        pleated skirt</a>
                                    <span class="mini-cart__product__quantity">1 x $49.00</span>
                                </div>
                            </li>
                            <li class="mini-cart__product">
                                <a href="#" class="remove-from-cart remove">
                                    <i class="dl-icon-close"></i>
                                </a>
                                <div class="mini-cart__product__image">
                                    <img src="{{ asset('frontend/assets') }}/img/products/prod-2-1-70x91.jpg"
                                        alt="products">
                                </div>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="product-details.html">Waxed-effect
                                        pleated skirt</a>
                                    <span class="mini-cart__product__quantity">1 x $49.00</span>
                                </div>
                            </li>
                        </ul>
                        <div class="mini-cart__total">
                            <span>Subtotal</span>
                            <span class="ammount">$98.00</span>
                        </div>
                        <div class="mini-cart__buttons">
                            <a href="cart.html" class="btn btn-fullwidth btn-style-1">View Cart</a>
                            <a href="checkout.html" class="btn btn-fullwidth btn-style-1">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Mini Cart End -->

        <!-- Global Overlay Start -->
        <div class="ai-global-overlay"></div>
        <!-- Global Overlay End -->

        <!-- Modal Start -->
        <div class="modal fade product-modal" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="dl-icon-close"></i>
                            </span>
                        </button>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="airi-element-carousel product-image-carousel nav-vertical-center nav-style-1"
                                    data-slick-options='{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "arrows": true,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "dl-icon-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "dl-icon-right" }
                                }'>
                                    <div class="product-image">
                                        <div class="product-image--holder">
                                            <a href="product-details.html">
                                                <img src="{{ asset('frontend/assets') }}/img/products/prod-9-1.jpg"
                                                    alt="Product Image" class="primary-image">
                                            </a>
                                        </div>
                                        <span class="product-badge sale">sale</span>
                                    </div>
                                    <div class="product-image">
                                        <div class="product-image--holder">
                                            <a href="product-details.html">
                                                <img src="{{ asset('frontend/assets') }}/img/products/prod-10-1.jpg"
                                                    alt="Product Image" class="primary-image">
                                            </a>
                                        </div>
                                        <span class="product-badge new">new</span>
                                    </div>
                                    <div class="product-image">
                                        <div class="product-image--holder">
                                            <a href="product-details.html">
                                                <img src="{{ asset('frontend/assets') }}/img/products/prod-11-1.jpg"
                                                    alt="Product Image" class="primary-image">
                                            </a>
                                        </div>
                                        <span class="product-badge hot">hot</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-box product-summary">
                                    <div class="product-navigation mb--10">
                                        <a href="#" class="prev"><i class="dl-icon-left"></i></a>
                                        <a href="#" class="next"><i class="dl-icon-right"></i></a>
                                    </div>
                                    <h3 class="product-title mb--15">Waxed-effect pleated skirt</h3>
                                    <span class="product-price-wrapper mb--20">
                                        <span class="money">$49.00</span>
                                        <span class="product-price-old">
                                            <span class="money">$60.00</span>
                                        </span>
                                    </span>
                                    <p class="product-short-description mb--25 mb-md--20">Donec accumsan auctor
                                        iaculis.
                                        Sed suscipit arcu ligula, at egestas magna molestie a. Proin ac ex maximus,
                                        ultrices justo eget, sodales orci. Aliquam egestas libero ac turpis pharetra, in
                                        vehicula lacus scelerisque. Vestibulum ut sem laoreet, feugiat tellus at,
                                        hendrerit arcu.</p>
                                    <div class="flex-row product-action d-flex align-items-center mb--30 mb-md--20">
                                        <div class="quantity">
                                            <input type="number" class="quantity-input" name="qty"
                                                id="quick-qty" value="1" min="1">
                                        </div>
                                        <button type="button" class="btn btn-style-1 btn-semi-large add-to-cart"
                                            onclick="window.location.href='cart.html'">
                                            Add To Cart
                                        </button>
                                        <a href="wishlist.html"><i class="dl-icon-heart2"></i></a>
                                        <a href="compare.html"><i class="dl-icon-compare2"></i></a>
                                    </div>
                                    <div class="product-extra mb--30 mb-md--20">
                                        <a href="#" class="font-size-12"><i class="fa fa-map-marker"></i>Find
                                            store near
                                            you</a>
                                        <a href="#" class="font-size-12"><i class="fa fa-exchange"></i>Delivery
                                            and
                                            return</a>
                                    </div>
                                    <div
                                        class="product-summary-footer d-flex justify-content-between flex-sm-row flex-column">
                                        <div class="product-meta">
                                            <span class="sku_wrapper font-size-12">SKU: <span class="sku">REF.
                                                    LA-887</span></span>
                                            <span class="posted_in font-size-12">Categories: <a
                                                    href="shop-sidebar.html" rel="tag">Fashions</a></span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->

    </div>
    <!-- Main Wrapper End -->


    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->
    <script src="{{ asset('frontend/assets') }}/js/vendor/jquery.min.js"></script>

    <!-- Bootstrap and Popper Bundle JS -->
    <script src="{{ asset('frontend/assets') }}/js/bootstrap.bundle.min.js"></script>

    <!-- All Plugins Js -->
    <script src="{{ asset('frontend/assets') }}/js/plugins.js"></script>

    <!-- Ajax Mail Js -->
    <script src="{{ asset('frontend/assets') }}/js/ajax-mail.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontend/assets') }}/js/main.js"></script>

    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('frontend/assets') }}/js/revoulation/jquery.themepunch.tools.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/revoulation/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{ asset('frontend/assets') }}/js/revoulation/extensions/revolution.extension.actions.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/revoulation/extensions/revolution.extension.carousel.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/revoulation/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/revoulation/extensions/revolution.extension.layeranimation.min.js">
    </script>
    <script src="{{ asset('frontend/assets') }}/js/revoulation/extensions/revolution.extension.migration.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/revoulation/extensions/revolution.extension.navigation.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/revoulation/extensions/revolution.extension.parallax.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/revoulation/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/revoulation/extensions/revolution.extension.video.min.js"></script>

    <!-- REVOLUTION ACTIVE JS FILES -->
    <script src="{{ asset('frontend/assets') }}/js/revoulation.js"></script>


</body>

</html>
