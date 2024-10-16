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
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SettingsController;
// use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;










Route::resource('orders', OrderController::class);
Route::resource('order-details', OrderDetailController::class);
Route::resource('products', ProductController::class);
Route::resource('product-images', ProductImageController::class);
Route::resource('feedbacks', FeedbackController::class);
Route::resource('ratings', RatingController::class);
Route::resource('users', UserController::class);
Route::resource('/categories', CategoryController::class);







Route::get('/home', function () {
    return view('welcome');
});


// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.home');
//Route::get('/reports', [DashboardController::class, 'index'])->name('reports');//---------
// Route::get('/settings', [DashboardController::class, 'index'])->name('settings');------------------
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');//-------
Route::post('/sales', [SalesController::class, 'store'])->name('sales.store');
Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
