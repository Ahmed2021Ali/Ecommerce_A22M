<?php

use App\Http\Controllers\AdminDashboard\AvailableCityController;
use App\Http\Controllers\AdminDashboard\BannerController;
use App\Http\Controllers\AdminDashboard\BrandController;
use App\Http\Controllers\AdminDashboard\CategoryController;
use App\Http\Controllers\AdminDashboard\ColorController;
use App\Http\Controllers\AdminDashboard\ContactUsController;
use App\Http\Controllers\AdminDashboard\CouponController;
use App\Http\Controllers\AdminDashboard\DashboardController;
use App\Http\Controllers\AdminDashboard\OrderController;
use App\Http\Controllers\AdminDashboard\ProductController;
use App\Http\Controllers\AdminDashboard\RoleController;
use App\Http\Controllers\AdminDashboard\ServiceController;
use App\Http\Controllers\AdminDashboard\SizeController;
use App\Http\Controllers\AdminDashboard\SliderController;
use App\Http\Controllers\AdminDashboard\SubCategoryController;
use App\Http\Controllers\AdminDashboard\UserController;
use Illuminate\Support\Facades\Route;

/*Route::get('/clear-cache', function() {
     Artisan::call('db:seed');
    // dd("done") ;
});*/

Route::middleware(['throttle:45,1','checkAdminRole'])->group(function () {
    Route::get('admin-dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('category', CategoryController::class);

    Route::resource('sub-category', SubCategoryController::class);

    Route::resource('size', SizeController::class);

    Route::resource('slider', SliderController::class);

    Route::resource('banner', BannerController::class);

    Route::resource('service', ServiceController::class);

    Route::resource('brands', BrandController::class);

    Route::resource('product', ProductController::class);

    Route::resource('color', ColorController::class);

    Route::resource('coupon', CouponController::class);

    Route::resource('contact', ContactUsController::class)->except(['store', 'edit', 'update']);

    Route::controller(OrderController::class)->prefix('order')->as('order.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('delivery/status/{order}', 'deliveryStatus')->name('deliveryStatus');
        Route::get('/done', 'ordersDone')->name('done');
        Route::get('/cancelled', 'ordersCancelled')->name('cancelled');
        Route::delete('/destroy/{order}', 'destroy')->name('destroy');
    });

    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class)->except('show');

    Route::resource('city', AvailableCityController::class);
});






