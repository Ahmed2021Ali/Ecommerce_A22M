<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;



//********************* Begin Authentication routes ******************************//

Route::controller(AuthController::class)->group(function(){

    Route::get('/view-signup-form',  'viewSignupForm')->name('signup.view.form');

    Route::post('/submit-signup', 'submitSignup')->name('signup.submit.form');

    Route::get('/view-signin-form',  'viewSigninForm')->name('signin.view.form');

    Route::post('/submit-signin',  'submitSignin')->name('signin.submit.form');

    Route::post('/logout',  'logout')->name('logout');
});
//********************* End Authentication routes ******************************//
