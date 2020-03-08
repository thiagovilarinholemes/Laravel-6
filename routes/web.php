<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Controller@index')->name('home');


/** Route Controller Product */
Route::any('product/search', 'ProductController@search')->name('product.search');
Route::resource('product', 'ProductController');