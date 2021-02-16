<?php

Route::group(['middleware' => ['auth']], function () {

    //Rota pra chamar o Login definido no Middleware Authenticate
    Route::get('/', function () {
        return view('CISTOMER');
    });

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
