<?php

use App\Http\Controllers\UserDashboard\FavController;
use App\Http\Controllers\UserDashboard\HomepageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomepageController::class, 'index'])->name('home');



Route::controller(HomepageController::class)->group(function(){

    //Route::get('/showAllCategory',  'showAllCategory')->name('showAllCategory');
});

Route::resource('fav', FavController::class);

