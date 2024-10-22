<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistoryMiddleware;

// ===== Backend
use App\Http\Controllers\backend\Auth\LoginController;
use App\Http\Controllers\backend\HomeController as BackendHomeController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\IndustryController;
use App\Http\Controllers\backend\AboutUsController;
use App\Http\Controllers\backend\CounterController;
use App\Http\Controllers\backend\SustainabilityController;
use App\Http\Controllers\backend\CustomerController;

// ===== Frontend
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;

Route::get('/', function () {
    return redirect()->route('frontend.home');
})->name('/');

// ======================= Admin Login/Logout
Route::get('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/login/store', [LoginController::class, 'authenticate'])->name('admin.login.store');

// ==== Logout
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// ======================= Admin Dashboard
Route::group(['prefix' => 'admin', 'middleware'=>['auth:web', PreventBackHistoryMiddleware::class]],function(){

    // ==== Dashboard
    Route::get('/dashboard', [BackendHomeController::class, 'Admin_Home'])->name('admin.dashboard');

    // ==== Update Password
    Route::get('/change-password', [BackendHomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [BackendHomeController::class, 'updatePassword'])->name('update-password');

    // ==== Manage Banner
    Route::resource('banner', BannerController::class);

    // ==== Manage Industry (Markets and Products)
    Route::resource('industry', IndustryController::class);

    // ==== Manage About Us
    Route::resource('about-us', AboutUsController::class);

    // ==== Manage Counter
    Route::resource('counter', CounterController::class);

    // ==== Manage Sustainability
    Route::resource('sustainability', SustainabilityController::class);

    // ==== Manage Innovation

    // ==== Manage Customer
    Route::resource('customer', CustomerController::class);

});

// ======================= Frontend
Route::group(['prefix'=> '', 'middleware'=>[PreventBackHistoryMiddleware::class]],function(){

    // ==== Home
    Route::get('/', [FrontendHomeController::class, 'home'])->name('frontend.home');

});

