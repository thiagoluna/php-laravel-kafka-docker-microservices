<?php

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
    //Products
    Route::resource('product', 'ProductController');
    Route::any('busca', 'ProductController@busca');
    Route::get('add-product', function () {
        return view('product.add');
    });

    //Customers
    Route::resource('customer', 'CustomerController');
    Route::any('busca', 'CustomerController@busca');
    Route::get('add-customer', function () {
        return view('customer.add');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
