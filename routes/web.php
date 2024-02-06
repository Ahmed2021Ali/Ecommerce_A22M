<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('welcome23');
})->name('welcome23');

    //********************* Authentication routes ******************************//
Route::controller(AuthController::class)->group(function(){

    Route::get('/view-signup',  'viewSignupForm')->name('signup.view.form');

    Route::post('/submit-signup', 'submitSignup')->name('signup.submit.form');

    Route::get('/submit-signin',  'viewSigninForm')->name('singin');

    Route::post('/login',  'login')->name('submit.login');

    Route::post('/logout',  'logout')->name('logout');
});
