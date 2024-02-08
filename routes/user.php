<?php

use App\Http\Controllers\UserDashboard\HomepageController;
use App\Http\Controllers\UserDashboard\ProductControlle;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomepageController::class, 'index'])->name('home');



Route::controller(HomepageController::class)->group(function(){

    //Route::get('/showAllCategory',  'showAllCategory')->name('showAllCategory');
});


Route::resource('products', ProductControlle::class);
