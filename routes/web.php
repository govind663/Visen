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
use App\Http\Controllers\backend\MeetOurMindsController;
use App\Http\Controllers\backend\MembersController;
use App\Http\Controllers\backend\GroupPoliciesController;
use App\Http\Controllers\backend\ProductFilterController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\IndustryDetailsController;
use App\Http\Controllers\backend\ProductCategoryController;
use App\Http\Controllers\backend\FactoryDetailsController;
use App\Http\Controllers\backend\CorporateHeadOfficeController;
use App\Http\Controllers\backend\ContactInformationController;
use App\Http\Controllers\backend\InnovationDetailsController;
use App\Http\Controllers\backend\FeaturesController;
use App\Http\Controllers\backend\FeaturesDetailsController;
use App\Http\Controllers\backend\StatisticsController;

// ===== Frontend
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;

Route::get('/', function () {
    return redirect()->route('frontend.home');
})->name('/');

// ======================= Admin Login/Logout
Route::get('/admin/login', [LoginController::class, 'login'])->name('login');
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

    // === Manage Meet Our Minds
    Route::resource('meet-our-minds', MeetOurMindsController::class);

    // ==== Manage Members
    Route::resource('members', MembersController::class);

    // ==== Manage Group Policies
    Route::resource('group-policies', GroupPoliciesController::class);

    // ==== Manage Product Filter
    Route::resource('product-filter', ProductFilterController::class);

    // ==== fetch Category Name
    Route::post('/fetchCategoryNname', [ProductFilterController::class, 'fetchCategoryNname'])->name('fetchCategoryNname');

    // ==== fetch Filter Name
    Route::post('/fetchFilterName', [ProductFilterController::class, 'fetchFilterName'])->name('fetchFilterName');

    // ==== Manage Product
    Route::resource('product', ProductController::class);

    // ==== Manage Industry Details
    Route::resource('industryDetails', IndustryDetailsController::class);

    // ===== Manage Product Category
    Route::resource('product-category', ProductCategoryController::class);

    // ===== getProductCategoryName
    Route::post('/getProductCategoryName', [ProductCategoryController::class, 'getProductCategoryName'])->name('getProductCategoryName');

    // ===== Manage Factory Details
    Route::resource('factory-details', FactoryDetailsController::class);

    // ===== manage Corporate Head Office
    Route::resource('corporate-head-office', CorporateHeadOfficeController::class);

    // ===== Manage Contact Information
    Route::resource('contact-information', ContactInformationController::class);

    // ===== Manage Innovation Details
    Route::resource('innovation-details', InnovationDetailsController::class);

    // ===== Manage Features
    Route::resource('features', FeaturesController::class);

    // ===== Manage Feature Details
    Route::resource('features-details', FeaturesDetailsController::class);

    // ===== Manage Statistics
    Route::resource('statistics', StatisticsController::class);

});

// ======================= Frontend
Route::group(['prefix'=> '', 'middleware'=>[PreventBackHistoryMiddleware::class]],function(){

    // ==== Home
    Route::get('/', [FrontendHomeController::class, 'home'])->name('frontend.home');

    // ==== Innovation
    Route::get('/innovation', [FrontendHomeController::class, 'innovation'])->name('frontend.innovation');

    // ==== Contact Us
    Route::get('/contact-us', [FrontendHomeController::class, 'contactUs'])->name('frontend.contact-us');

    // ===== Investor Relations
    Route::get('/investor-relations', [FrontendHomeController::class, 'investorRelations'])->name('frontend.investor-relations');

    // ==== News, Media & Events
    Route::get('/news-media-events', [FrontendHomeController::class, 'newsMediaEvents'])->name('frontend.news-media-events');

    // ==== Download Brochure
    Route::get('/download-brochure', [FrontendHomeController::class, 'downloadBrochure'])->name('frontend.download-brochure');

    // ==== Meet our Minds
    Route::get('/meet-our-minds', [FrontendHomeController::class, 'meetOurMinds'])->name('frontend.meet-our-minds');

    // ===== Group Policies
    Route::get('/group-policies', [FrontendHomeController::class, 'groupPolicies'])->name('frontend.group-policies');

    // ==== My list
    Route::get('/my-list', [FrontendHomeController::class, 'myList'])->name('frontend.my-list');

    // ==== Product Details Page With Slug
    Route::get('/product-details/{industry?}/{category?}', [FrontendHomeController::class, 'productDetails'])->name('frontend.product-details');

    // ==== Find Product
    
});
