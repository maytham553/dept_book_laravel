<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('/customer' , 'CustomerController');
Route::apiResource('/item' , 'ItemController');
Route::post('/customer/search', 'CustomerController@search');
Route::get('/customer/showByCustomerId/{CustomerId}', 'ItemController@showByCustomerId');