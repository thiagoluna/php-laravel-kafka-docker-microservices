<?php

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {

    Route::resource('product','ProductController');

    Route::any('busca', 'ProductController@busca');

    Route::get('add-product', function () {
        return view('product.add');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
