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
Route::prefix('/experiment');

/**
 * **************************************
 * Dummy routes
 * **************************************
 * 
 * If you just want to print or know value of something
 * don't be shy to expose it here.
 */
Route::prefix('/dummy')->group(function () {
    Route::get('/docker-ip', function () {
        return \Illuminate\Support\Facades\Request::ip();
    });
});