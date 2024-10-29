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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;



Auth::routes();


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');//(??????????????)

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('orders', OrderController::class);
    Route::resource('order-details', OrderDetailController::class);
    Route::resource('products', ProductController::class);


    // Route::resource('product-images', ProductImageController::class);
    // Routeeee::resource('productImagessss', ProductImageController::classsss);


    Route::resource('feedbacks', FeedbackController::class);
    Route::resource('ratings', RatingController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);



    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/sales', [SalesController::class, 'store'])->name('sales.store');
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('/admin-profile', [AdminController::class, 'show'])->name('admin.profile');
});




Route::get('/', function () { return view('userSide.landing'); });
Route::get('/home', function () { return view('userSide.landing'); });
Route::get('/shop', function () { return view('userSide.shop'); });
Route::get('/contact', function () { return view('userSide.contact'); });











//10/26/2024
