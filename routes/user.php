<?php

use App\Http\Controllers\UserDashboard\AddressController;
use App\Http\Controllers\UserDashboard\CartController;
use App\Http\Controllers\UserDashboard\ContactUsController;
use App\Http\Controllers\UserDashboard\FavController;
use App\Http\Controllers\UserDashboard\HomepageController;
use App\Http\Controllers\UserDashboard\ProductControlle;
use App\Http\Controllers\UserDashboard\OrderController;
use App\Http\Controllers\UserDashboard\ProfileController;
use Illuminate\Support\Facades\Route;
use JeroenNoten\LaravelAdminLte\View\Components\Widget\ProfileColItem;

Route::get('/', [HomepageController::class, 'index'])->name('home');



Route::controller(HomepageController::class)->group(function(){
    //Route::get('/showAllCategory',  'showAllCategory')->name('showAllCategory');
});


Route::resource('products', ProductControlle::class);


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
    Route::get('/index',  'index')->name('index');
    Route::post('/store/{address}',  'store')->name('store');
    Route::get('/destroy/{order}',  'destroy')->name('destroy');
});

Route::post('/contactUs/store', [ContactUsController::class, 'store'])->name('contact.store');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact.index');


Route::resource('address', AddressController::class);


Route::get('/category/products/{category_id}', [ProductControlle::class, 'productsOfCategory'])->name('category.products');


Route::get('/pofile', [ProfileController::class, 'index'])->name('profile.index');


Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
