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


Auth::routes();


    Route::get('/', function () {
        return redirect('home');
    })->name('index');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/user-details', 'UsersController@index')->name('user-details');
    Route::post('/user-details', 'UsersController@update')->name('update-user-details');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::get('/contact', 'ContactController@index')->name('contact');

    Route::get('/checkout', 'CheckoutController@index')->name('checkout');
    Route::post('/place-order', 'OrdersController@create')->name('place-order');
    Route::get('/search', 'HomeController@search')->name('search');


Route::group(['prefix' => 'backoffice', 'middleware' => 'admin'], function () {
    Route::get('/home', 'HomeController@index');


    Route::get('/suppliers', 'SuppliersController@index')->name('suppliers');
    Route::get('/new-supplier', 'SuppliersController@new')->name('new-supplier');
    Route::post('/suppliers', 'SuppliersController@create')->name('suppliers');
    Route::get('/edit-supplier/{supplier}', 'SuppliersController@edit')->name('edit-supplier');
    Route::patch('/update-supplier', 'SuppliersController@update')->name('update-supplier');
    Route::delete('/destroy-supplier/{supplier}', 'SuppliersController@destroy')->name('destroy-supplier');


    Route::get('/brands', 'BrandsController@index')->name('brands');
    Route::get('/new-brand', 'BrandsController@new')->name('new-brand');
    Route::post('/brands', 'BrandsController@create')->name('brands');
    Route::get('/edit-brand/{brand}', 'BrandsController@edit')->name('edit-brand');
    Route::patch('/update-brand', 'BrandsController@update')->name('update-brand');
    Route::delete('/destroy-brand/{brand}', 'BrandsController@destroy')->name('destroy-brand');


    Route::get('/types', 'TypesController@index')->name('types');
    Route::get('/new-type', 'TypesController@new')->name('new-type');
    Route::post('/types', 'TypesController@create')->name('types');
    Route::get('/edit-type/{type}', 'TypesController@edit')->name('edit-type');
    Route::patch('/update-type', 'TypesController@update')->name('update-type');
    Route::delete('/destroy-type/{type}', 'TypesController@destroy')->name('destroy-type');


    Route::get('/clients', 'ClientsController@index')->name('clients');
    Route::get('/new-client', 'ClientsController@new')->name('new-client');
    Route::post('/clients', 'ClientsController@create')->name('clients');
    Route::get('/edit-client/{client}', 'ClientsController@edit')->name('edit-client');
    Route::patch('/update-client', 'ClientsController@update')->name('update-client');


    Route::get('/products', 'ProductsController@index')->name('products');
    Route::get('/new-product', 'ProductsController@new')->name('new-product');
    Route::post('/products', 'ProductsController@create')->name('products');
    Route::get('/edit-product/{product}', 'ProductsController@edit')->name('edit-product');
    Route::patch('/update-product', 'ProductsController@update')->name('update-product');
    Route::delete('/destroy-product/{product}', 'ProductsController@destroy')->name('destroy-product');
});



