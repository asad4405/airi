<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariationController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/product/details/{slug}', [FrontendController::class, 'product_details'])->name('product.details');



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
});

require __DIR__ . '/auth.php';

// Customer
// login and register
Route::prefix('customer')->controller(CustomerController::class)->name('customer.')->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register/store', 'register_store')->name('register.store');
    Route::get('/login', 'login')->name('login');
    Route::post('/login/store', 'login_store')->name('login.store');
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/logout', 'logout')->name('logout');
});

// Route::get()
