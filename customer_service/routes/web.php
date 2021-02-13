<?php

Route::get('/', 'CustomerController@index');

//Products
Route::resource('product','ProductController');
Route::any('busca', 'ProductController@busca');
Route::get('add-product', function () {
    return view('product.add');
});

//Customers
Route::resource('customer','CustomerController');
Route::any('busca', 'CustomerController@busca');
Route::get('add-customer', function () {
    return view('customer.add');
});
