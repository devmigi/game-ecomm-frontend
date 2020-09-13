<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Account Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', 'verified'])->namespace('Customer')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'HomeController@show')->name('home');

Route::get('/{category}', 'CategoryController@show')->name('category');

Route::get('/{category}/{game}', 'ProductController@show')->name('product');

