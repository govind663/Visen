<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistoryMiddleware;

// ===== Backend
use App\Http\Controllers\backend\Auth\LoginController;
use App\Http\Controllers\backend\HomeController as BackendHomeController;


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


});

// ======================= Frontend
Route::group(['prefix'=> '', 'middleware'=>[PreventBackHistoryMiddleware::class]],function(){

    // ==== Home
    Route::get('/', [FrontendHomeController::class, 'home'])->name('frontend.home');

});

