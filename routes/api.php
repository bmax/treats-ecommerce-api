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

// POSTS
Route::post( 'auth', 'Auth\LoginController@store' );
Route::post( 'register', 'Auth\RegisterController@store' );
Route::post( 'product', 'ProductsController@store' );
