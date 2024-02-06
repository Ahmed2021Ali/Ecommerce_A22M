<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminDashboard\CategoryController;
use Illuminate\Support\Facades\Route;



    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/dashboard', function () {
        return view('welcome23');
    })->name('welcome23');





