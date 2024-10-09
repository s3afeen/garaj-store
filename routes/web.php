<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RatingController;


Route::resource('orders', OrderController::class);
Route::resource('order-details', OrderDetailController::class);
Route::resource('products', ProductController::class);
Route::resource('product-images', ProductImageController::class);
Route::resource('feedbacks', FeedbackController::class);
Route::resource('ratings', RatingController::class);

Route::get('/', function () {
    return view('dashboard.home');
});
