<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', 'ProductController@index');

Route::resource('product','ProductController');

Route::any('busca', 'ProductController@busca');

Route::get('add-product', function () {
    return view('product.add');
});
