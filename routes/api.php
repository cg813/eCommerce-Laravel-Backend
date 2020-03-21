<?php
Route::group([
    'middleware' => 'api',
], function () {

    // auth apis
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');

    Route::post('createClient', 'AuthController@signup');
    Route::post('createDeliver', 'AuthController@signup');
});

Route::get('/', function () {
    return 'Hello World';
});

// user apis
Route::get('getClients', 'ClientController@index');
Route::get('getClient/{id}', 'ClientController@show');
Route::post('deleteClient/{id}', 'ClientController@delete');
Route::post('updateClient/{id}', 'ClientController@update');

Route::get('getDelivers', 'DeliverController@index');
Route::get('getDeliver/{id}', 'DeliverController@show');
Route::post('deleteDeliver/{id}', 'DeliverController@delete');
Route::post('updateDeliver/{id}', 'DeliverController@update');

// product apis
Route::get('getProducts', 'ProductController@index');
Route::get('getProduct/{id}', 'ProductController@show');
Route::post('createProduct', 'ProductController@store');
Route::post('deleteProduct/{id}', 'ProductController@delete');
Route::post('updateProduct/{id}', 'ProductController@update');

// order apis
Route::post('getAllOrders', 'OrderController@getAllOrders');
Route::post('getClientOrders/{clientId}', 'OrderController@getClientOrders');
Route::post('updateOrder/{id}', 'OrderController@update');
Route::post('createOrder', 'OrderController@store');

Route::get('getOrderDetail/{orderId}', 'OrderDetailController@getOrderDetail');
Route::post('createOrderDetail', 'OrderDetailController@createOrderDetail');

// business apis
Route::get('getClientBusiness/{clientId}', 'BusinessController@getClientBusinesses');
Route::get('getBusiness/{id}', 'BusinessController@show');
Route::post('createBusiness', 'BusinessController@store');
Route::post('deleteBusiness/{id}', 'BusinessController@delete');
Route::post('updateBusiness/{id}', 'BusinessController@update');

// common apis
Route::post('uploadImage', 'CommonController@uploadImage');
