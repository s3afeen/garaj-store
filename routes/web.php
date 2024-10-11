<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;



Route::resource('orders', OrderController::class);
Route::resource('order-details', OrderDetailController::class);
Route::resource('products', ProductController::class);
Route::resource('product-images', ProductImageController::class);
Route::resource('feedbacks', FeedbackController::class);
Route::resource('ratings', RatingController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);







Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.home');
Route::get('/reports', [DashboardController::class, 'index'])->name('reports');
Route::get('/settings', [DashboardController::class, 'index'])->name('settings');

