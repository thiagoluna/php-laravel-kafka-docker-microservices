<?php

Route::get('/', function () {
    $url='http://localhost:8000/saml2/RENTAL/login';
    return redirect($url);
})->name('login');

Route::get('/login', function () {
    $url='http://localhost:8000/saml2/RENTAL/login';
    return redirect($url);
})->name('login');

Route::get('/logout', function () {
    $url='http://localhost:8000/saml2/RENTAL/logout';
    return redirect($url);
})->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'OrderController@index');

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

    //Orders
    Route::post('store-order-item', 'OrderController@storeOrderItem')->name('store.order.item');
    Route::post('store-order-payment', 'OrderController@storeOrderPayment')->name('store.order.payment');
    Route::resource('order','OrderController');
    Route::any('busca', 'OrderController@busca');
    Route::get('add-order', 'OrderController@addOrder');
    Route::get('add-order-item/{order_id}', 'OrderController@addOrderItem')->name('add.order.item');
    Route::get('edit-order-item/{item_id}', 'OrderController@editOrderItem')->name('edit.order.item');
    Route::post('update-order-item/{item_id}', 'OrderController@updateOrderItem')->name('update.order.item');
    Route::get('add-order-payment/{order_id}', 'OrderController@addOrderPayment')->name('add.order.payment');

});
