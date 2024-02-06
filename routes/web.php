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

        //********************* Begin Authentication routes ******************************//
    Route::controller(AuthController::class)->group(function(){

        Route::get('/view-signup-form',  'viewSignupForm')->name('signup.view.form');

        Route::post('/submit-signup', 'submitSignup')->name('signup.submit.form');

        Route::get('/view-signin-form',  'viewSigninForm')->name('signin.view.form');

        Route::post('/submit-signin',  'submitSignin')->name('signin.submit.form');

        Route::post('/logout',  'logout')->name('logout');
    });
        //********************* End Authentication routes ******************************//


    Route::resource('categories', CategoryController::class);

