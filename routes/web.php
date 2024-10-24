<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistoryMiddleware;

// ===== Backend
use App\Http\Controllers\backend\Auth\LoginController;
use App\Http\Controllers\backend\HomeController as BackendHomeController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\MarketIntroductionController;
use App\Http\Controllers\backend\IndustryController;
use App\Http\Controllers\backend\AboutUsController;
use App\Http\Controllers\backend\CounterController;
use App\Http\Controllers\backend\SustainabilityController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\AnnualReportsController;
use App\Http\Controllers\backend\InvestorsContactsController;
use App\Http\Controllers\backend\NewsController;
use App\Http\Controllers\backend\MediaController;
use App\Http\Controllers\backend\EventsController;
use App\Http\Controllers\backend\GroupPoliciesController;
use App\Http\Controllers\backend\ProductFilterController;

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

    // ==== Manage Market Introduction
    Route::resource('market-introduction', MarketIntroductionController::class);

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

    // ==== Manage Annual Reports
    Route::resource('annual-reports', AnnualReportsController::class);

    // ==== Manage Investors Contacts
    Route::resource('investors-contacts', InvestorsContactsController::class);

    // ==== Manage News
    Route::resource('news', NewsController::class);

    // ==== Manage Media
    Route::resource('media', MediaController::class);

    // ==== Manage Events
    Route::resource('events', EventsController::class);

    // ==== Manage Group Policies
    Route::resource('group-policies', GroupPoliciesController::class);

    // ==== Manage Product Filter
    Route::resource('product-filter', ProductFilterController::class);
    Route::post('/fetchCategoryNname', [ProductFilterController::class, 'fetchCategoryNname'])->name('fetchCategoryNname');

});

// ======================= Frontend
Route::group(['prefix'=> '', 'middleware'=>[PreventBackHistoryMiddleware::class]],function(){

    // ==== Home
    Route::get('/', [FrontendHomeController::class, 'home'])->name('frontend.home');

});

