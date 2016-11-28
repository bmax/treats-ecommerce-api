<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// GETS
Route::get( 'status', 'StatusController@index' );
Route::get( 'products', 'ProductsController@list' );
Route::get( 'product/{id}', 'ProductsController@get' );
Route::get( 'orders', 'OrdersController@list' );
Route::get( 'order/{id}', 'OrdersController@get' );

// POSTS
Route::post( 'auth', 'Auth\LoginController@store' );
Route::post( 'user/create', 'Auth\UserController@store' );
Route::post( 'product', 'ProductsController@store' );
Route::post( 'order/{id}/charge', 'OrdersController@charge' );
