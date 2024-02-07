<?php

use App\Http\Controllers\AdminDashboard\CategoryController;
use App\Http\Controllers\AdminDashboard\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard\RoleController;
use App\Http\Controllers\AdminDashboard\UserController;



Route::get('/adminDashboard', function () {
    return view('adminDashboard.dashboard');
});
Route::resource('category', CategoryController::class);
Route::resource('slider', SliderController::class);


Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

