<?php

use App\Http\Controllers\UserDashboard\SearchController;
use App\Http\Controllers\UserDashboard\AddressController;
use App\Http\Controllers\UserDashboard\CartController;
use App\Http\Controllers\UserDashboard\ContactUsController;
use App\Http\Controllers\UserDashboard\FavController;
use App\Http\Controllers\UserDashboard\HomepageController;
use App\Http\Controllers\UserDashboard\ProductControlle;
use App\Http\Controllers\UserDashboard\OrderController;
use App\Http\Controllers\UserDashboard\ProfileController;
use Illuminate\Support\Facades\Route;



    Route::get('/', [HomepageController::class, 'index'])->name('home');

    Route::resource('products', ProductControlle::class);

    Route::resource('address', AddressController::class);



    Route::controller(FavController::class)->prefix('fav')->as('fav.')->group(function(){
        Route::get('/index',  'index')->name('index');
        Route::post('/store/{product}', 'store')->name('store');
        Route::get('/destroy/{fav}',  'destroy')->name('destroy');
    });

    Route::controller(CartController::class)->prefix('cart')->as('cart.')->group(function(){
        Route::get('/index',  'index')->name('index');
        Route::post('/store/{product}',  'store')->name('store');
        Route::put('/update/{cart}',  'update')->name('update');
        Route::delete('/destroy/{cart}',  'destroy')->name('destroy');
        Route::get('/clear',  'clear')->name('clear');
    });

    Route::controller(OrderController::class)->prefix('order')->as('order.')->group(function(){
        Route::get('/show/{order_number}',  'show')->name('show');
        Route::get('/index',  'index')->name('index');
        Route::get('/destroy/{order}',  'destroy')->name('destroy');
    });

    Route::controller(ContactUsController::class)->prefix('contact-us')->as('contact-us.')->group(function () {
        Route::post('/store', 'store')->name('store');
        Route::get('/index', 'index')->name('index');
    });

    Route::controller(ProfileController::class)->prefix('profile')->as('profile.')->group(function () {
        Route::get('/pofile', 'index')->name('index');
        Route::post('/update', 'update')->name('update');
    });


    Route::get('/category/products/{category_id}', [ProductControlle::class, 'productsOfCategory'])->name('category.products');

    Route::get('/filter', [SearchController::class, 'filter'])->name('search.filter');
