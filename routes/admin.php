<?php

use App\Http\Controllers\AdminDashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard\RoleController;
use App\Http\Controllers\AdminDashboard\UserController;


Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

