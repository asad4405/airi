<?php

use App\Http\Controllers\CategoryController;
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
Route::get('/product/details/{slug}',[FrontendController::class,'product_details'])->name('product.details');



// Dashboard
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    // Users
    Route::get('/user/update', [UserController::class, 'user_update'])->name('user.update');
    Route::post('/user/update/store', [UserController::class, 'user_update_store'])->name('user.update.store');
    Route::post('/user/password/update', [UserController::class, 'user_password_update'])->name('user.password.update');
    Route::post('/user/photo/update', [UserController::class, 'user_photo_update'])->name('user.photo.update');

    Route::get('/user', [UserController::class, 'user_list'])->name('user');
    Route::post('/user/store', [UserController::class, 'user_store'])->name('user.store');
    Route::get('/user/delete/{id}', [UserController::class, 'user_delete'])->name('user.delete');

    // Category
    Route::get('/category', [CategoryController::class, 'category'])->name('category');
    Route::post('category/store', [CategoryController::class, 'category_store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'category_edit'])->name('category.edit');
    Route::post('category/update/{id}', [CategoryController::class, 'category_update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'category_delete'])->name('category.delete');

    // Subcategory
    Route::resource('/subcategory', SubcategoryController::class);

    // Tag
    Route::get('/tag', [TagController::class, 'tag'])->name('tag');
    Route::post('/tag/store', [TagController::class, 'tag_store'])->name('tag.store');
    Route::get('/tag/delete/{id}', [TagController::class, 'tag_delete'])->name('tag.delete');

    // Product
    Route::resource('/product', ProductController::class);

    // variation
    Route::get('/variation', [VariationController::class, 'variation'])->name('variation');
    Route::post('/color/store', [VariationController::class, 'color_store'])->name('color.store');
    Route::post('/size/store', [VariationController::class, 'size_store'])->name('size.store');
    Route::get('/color/delete/{id}', [VariationController::class, 'color_delete'])->name('color.delete');
    Route::get('/size/delete/{id}', [VariationController::class, 'size_delete'])->name('size.delete');

    // Invetory
    Route::get('/inventory/{product_id}', [InventoryController::class, 'inventory'])->name('inventory');
    Route::post('/inventory/store/{product_id}', [InventoryController::class, 'inventory_store'])->name('inventory.store');
    Route::get('/inventory/delete/{inventory_id}', [InventoryController::class, 'inventory_delete'])->name('inventory.delete');
});
