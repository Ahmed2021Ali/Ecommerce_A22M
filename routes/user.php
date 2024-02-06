<?php

use App\Http\Controllers\UserDashboard\HomepageController;
use Illuminate\Support\Facades\Route;




Route::controller(HomepageController::class)->group(function(){

    //Route::get('/showAllCategory',  'showAllCategory')->name('showAllCategory');

});
