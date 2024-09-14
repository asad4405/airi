<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[FrontendController::class,'index'])->name('index');



// Dashboard
Route::get('/dashboard',[HomeController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Users
Route::get('/user/update',[UserController::class,'user_update'])->name('user.update');
Route::post('/user/update/store',[UserController::class,'user_update_store'])->name('user.update.store');
Route::post('/user/password/update',[UserController::class,'user_password_update'])->name('user.password.update') ;
Route::post('/user/photo/update',[UserController::class,'user_photo_update'])->name('user.photo.update') ;

Route::get('/user',[UserController::class,'user_list'])->name('user');
Route::post('/user/store',[UserController::class,'user_store'])->name('user.store');
Route::get('/user/delete/{id}',[UserController::class,'user_delete'])->name('user.delete');
