<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\UserDashboard\ReviewController;
use App\Http\Controllers\UserDashboard\SearchController;
use App\Http\Controllers\UserDashboard\AddressController;
use App\Http\Controllers\UserDashboard\CartController;
use App\Http\Controllers\UserDashboard\ContactUsController;
use App\Http\Controllers\UserDashboard\FavController;
use App\Http\Controllers\UserDashboard\HomepageController;
use App\Http\Controllers\UserDashboard\ProductController;
use App\Http\Controllers\UserDashboard\OrderController;
use App\Http\Controllers\UserDashboard\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('throttle:45,1')->group(function () {

    Route::get('/', [HomepageController::class, 'index'])->name('home');

    Route::get('/about',[AboutController::class,'index'])->name('about');

    Route::view('/privacy-policy',  'userDashboard.privacyPolicy.index')->name('privacyPolicy');

    Route::resource('products', ProductController::class);

    Route::get('/category/products/{category_id}', [ProductController::class, 'productsOfCategory'])->name('category.products');// Enhanced

    Route::controller(SearchController::class)->as('search')->group(function () {
        Route::get('/filter', 'filter')->name('.filter');
        Route::get('/search', 'search');
    });

    Route::middleware('auth')->group(function () {
        Route::controller(ContactUsController::class)->prefix('contact-us')->as('contact-us.')->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });

        Route::controller(FavController::class)->prefix('fav')->as('fav.')->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/destroy/{fav}', 'destroy')->name('destroy');
            Route::post('/store/{product}', 'store')->name('store');
        });

        Route::controller(CartController::class)->prefix('cart')->as('cart.')->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::post('/store/{product}', 'store')->name('store');
            Route::put('/update/{cart}', 'update')->name('update');
            Route::delete('/destroy/{cart}', 'destroy')->name('destroy');
            Route::get('/clear', 'clear')->name('clear');
        });

        Route::controller(OrderController::class)->prefix('orders')->as('orders.')->group(function () {
            Route::get('/show/{order}', 'show')->name('show');
            Route::post('/search', 'search')->name('search');
            Route::delete('/destroy/{order}', 'destroy')->name('destroy');
        });

        Route::controller(ReviewController::class)->prefix('review')->as('review.')->group(function () {
            Route::post('/store/{product}', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{review}', 'update')->name('update');
            Route::delete('/destroy/{review}', 'destroy')->name('destroy');
        });

        Route::controller(ProfileController::class)->prefix('profile')->as('profile.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/update', 'update')->name('update');
            Route::get('/delete-user-image', 'deleteUserImage')->name('delete.userImage');
            Route::get('/view-image/{id}', 'viewImage')->name('view.image');
        });

        Route::resource('address', AddressController::class);
    });
});




