<?php

use App\Http\Controllers\AdminDashboard\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class);


