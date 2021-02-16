<?php

Route::group(['middleware' => ['auth']], function () {

    //Rota pra chamar o Login definido no Middleware Authenticate
    Route::get('/', function () {
        return view('product');
    });

    Route::resource('product','ProductController');

    Route::any('busca', 'ProductController@busca');

    Route::get('add-product', function () {
        return view('product.add');
    });
});

