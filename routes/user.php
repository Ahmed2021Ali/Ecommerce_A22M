<?php

use App\Http\Controllers\UserDashboard\AddressController;
use App\Http\Controllers\UserDashboard\CartController;
use App\Http\Controllers\UserDashboard\ContactUsController;
use App\Http\Controllers\UserDashboard\FavController;
use App\Http\Controllers\UserDashboard\HomepageController;
use App\Http\Controllers\UserDashboard\ProductControlle;
use App\Http\Controllers\UserDashboard\OrderController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomepageController::class, 'index'])->name('home');



Route::controller(HomepageController::class)->group(function(){
    //Route::get('/showAllCategory',  'showAllCategory')->name('showAllCategory');
});


Route::resource('products', ProductControlle::class);
