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

use App\Item;

Route::get('/', 'ItemController@index');
Route::get('/item/{id}', 'ItemController@view');
Route::post('/item/{id}', 'CartController@add');
Route::get('/item/favorite/{id}', 'FavoriteController@add');

Auth::routes();

Route::get('/cart', 'CartController@index');
Route::delete('/cart', 'CartController@delete');
Route::put('/cart', 'CartController@update');
