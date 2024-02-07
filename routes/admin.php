<?php

use App\Http\Controllers\AdminDashboard\BannerController;
use App\Http\Controllers\AdminDashboard\BrandController;
use App\Http\Controllers\AdminDashboard\CategoryController;
use App\Http\Controllers\AdminDashboard\ProductController;
use App\Http\Controllers\AdminDashboard\ServiceController;
use App\Http\Controllers\AdminDashboard\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard\RoleController;
use App\Http\Controllers\AdminDashboard\UserController;



Route::get('/admin-dashboard', function () {
    return view('adminDashboard.dashboard');
})->middleware('checkAdminRole')->name('admin.dashboard');

Route::resource('category', CategoryController::class);
Route::resource('slider', SliderController::class);
Route::resource('banner', BannerController::class);
Route::resource('service', ServiceController::class);
Route::resource('brand', BrandController::class);
Route::resource('product', ProductController::class);




Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class)->except('show');

