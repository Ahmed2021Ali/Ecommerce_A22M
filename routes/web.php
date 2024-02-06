<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

    //********************* Authentication routes ******************************//
Route::controller(AuthController::class)->group(function(){

    Route::get('/view-signup',  'viewSignupForm')->name('signup.view.form');

    Route::post('/submit-signup', 'submitSignup')->name('signup.submit.form');

    Route::get('/submit-signin',  'viewSigninForm')->name('singin');

    Route::post('/login',  'login')->name('submit.login');
    
    Route::post('/logout',  'logout')->name('logout');
});