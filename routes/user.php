<?php

use App\Http\Controllers\UserDashboard\HomepageController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');



Route::controller(HomepageController::class)->group(function(){

    //Route::get('/showAllCategory',  'showAllCategory')->name('showAllCategory');
});
