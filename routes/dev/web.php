<?php

use Illuminate\Support\Facades\Route;

/**
 * **************************************
 * Real application routes
 * **************************************
 * 
 * Routes that will ready to push into staging or production!
 */
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * **************************************
 * Experiment routes
 * **************************************
 * 
 * Such functions that you want to try, smash it here!
 */
Route::prefix('/experiment')->name('experiment.')->group(function () {
    Route::name('mn:customer.')->group(function () {
        Route::get('/customers', 'CustomerController@index')->name('index-customer');
        Route::get('/customer/{id}', 'CustomerController@show')->name('show-customer');
        Route::post('/customers', 'CustomerController@store')->name('pc:store-customer');
        Route::put('/customers/{id}', 'CustomerController@update')->name('pc:update-customer');
    });
    Route::name('mn:user.')->group(function () {
        Route::get('/users', 'UserController@index')->name('index');
    });
});

/**
 * **************************************
 * Dummy routes
 * **************************************
 * 
 * If you just want to print or know value of something
 * don't be shy to expose it here.
 */
Route::prefix('/dummy')->name('dummy.')->group(function () {
    Route::get('/docker-ip', function () {
        return \Illuminate\Support\Facades\Request::ip();
    });
    Route::get('/get-route-name', function () {
        return Route::currentRouteName();
    })->name('dummy.get-route-name');
    Route::get('/uuid', function () {
        return Str::uuid();
    });
});