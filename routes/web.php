<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/product/details/{slug}', [FrontendController::class, 'product_details'])->name('product.details');
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');


// Dashboard
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// backend

Route::middleware('auth')->group(function () {
    // Users
    Route::prefix('user')->controller(UserController::class)->name('user.')->group(function () {
        Route::get('/update', [UserController::class, 'user_update'])->name('update');
        Route::post('/update/store', [UserController::class, 'user_update_store'])->name('update.store');
        Route::post('/password/update', [UserController::class, 'user_password_update'])->name('password.update');
        Route::post('/photo/update', [UserController::class, 'user_photo_update'])->name('photo.update');

        Route::get('/index', [UserController::class, 'index'])->name('index');
        Route::post('/store', [UserController::class, 'user_store'])->name('store');
        Route::get('/delete/{id}', [UserController::class, 'user_delete'])->name('delete');
    });

    // Category
    Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('index');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });

    // Subcategory
    Route::resource('/subcategory', SubcategoryController::class);

    // Tag
    Route::prefix('tag')->controller(TagController::class)->name('tag.')->group(function () {
        Route::get('/index', [TagController::class, 'index'])->name('index');
        Route::post('/store', [TagController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [TagController::class, 'delete'])->name('delete');
    });

    // Product
    Route::resource('/product', ProductController::class);

    // Invetory
    Route::prefix('inventory')->controller(InventoryController::class)->name('inventory.')->group(function () {
        Route::get('/index/{product_id}', [InventoryController::class, 'index'])->name('index');
        Route::post('/store/{product_id}', [InventoryController::class, 'store'])->name('store');
        Route::get('/edit/{inventory_id}', [InventoryController::class, 'edit'])->name('edit');
        Route::post('/update/{inventory_id}', [InventoryController::class, 'update'])->name('update');
        Route::get('/delete/{inventory_id}', [InventoryController::class, 'delete'])->name('delete');
    });

    // Coupon
    Route::prefix('coupon')->controller(CouponController::class)->name('coupon.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

    // Order
    Route::prefix('order')->controller(OrderController::class)->name('order.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/status/update/{id}', 'status_update')->name('status.update');
    });

    // Role Manager
    Route::prefix('role')->controller(RoleController::class)->name('role.')->group(function () {
        Route::get('/','index')->name('index');
        Route::post('/permission/store', 'permission_store')->name('permission.store');
        Route::post('/store', 'role_store')->name('store');
        Route::post('/assign', 'role_assign')->name('assign');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });
});

Route::middleware('auth.customer')->group(function () {
    // Cart
    Route::prefix('cart')->controller(CartController::class)->name('cart.')->group(function () {
        Route::post('/add', 'add')->name('add');
        Route::get('/remove/{id}', 'remove')->name('remove');
        Route::get('/', 'index')->name('index');
        Route::get('/clear', 'clear')->name('clear');
        Route::post('/update', 'update')->name('update');
    });

    // Checkout
    Route::prefix('checkout')->controller(CheckoutController::class)->name('checkout.')->group(function () {
        Route::get('/', 'checkout')->name('index')->middleware('auth.customer');
        Route::post('/getcity', 'getcity')->middleware('auth.customer');
        Route::post('/order/store', 'order_store')->name('order.store')->middleware('auth.customer');
        Route::get('/order/success', 'order_success')->name('order.success')->middleware('auth.customer');
    });
});

// SSLCOMMERZ Start
Route::get('/pay', [SslCommerzPaymentController::class, 'index'])->name('sslpay');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

// Socialite
Route::get('/google/redirect', [SocialiteController::class, 'google_redirect'])->name('google.redirect');
Route::get('/google/callback', [SocialiteController::class, 'google_callback'])->name('google.callback');

// Customer
Route::prefix('customer')->controller(CustomerController::class)->name('customer.')->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register/store', 'register_store')->name('register.store');
    Route::get('/login', 'login')->name('login');
    Route::post('/login/store', 'login_store')->name('login.store');
    Route::get('/profile', 'profile')->name('profile');
    Route::post('/update', 'update')->name('update');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/download/invoice/{id}', 'invoice')->name('download.invoice');
});

// Forgot Password
Route::prefix('password')->controller(PasswordResetController::class)->name('password.')->group(function () {
    Route::get('/forgot', 'forgot')->name('forgot');
    Route::post('/forgot/post', 'forgot_post')->name('forgot.post');
    Route::get('/password/reset/request/{token}', 'reset_request')->name('reset.request');
    Route::post('/password/reset/confirm/{token}', 'reset_confirm')->name('reset.confirm');
});

// Email Verify
Route::prefix('email')->controller(CustomerController::class)->name('email.')->group(function () {
    Route::get('/verify/customer/{token}', 'email_verify_customer')->name('verify.customer');
    Route::get('/verify/resend/{token}', 'email_verify_resend')->name('verify.resend');
    Route::get('/verify/resend', 'email_verify_resend')->name('verify.resend');
    Route::post('/verify/resend/link', 'email_verify_resend_link')->name('verify.resend.link');
});

// review
Route::post('review/store/{id}', [FrontendController::class, 'review_store'])->middleware('auth.customer')->name('review.store');



require __DIR__ . '/auth.php';
