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
Route::apiResource('/entry' , 'AccountingEntryController');
Route::post('/customer/search', 'CustomerController@search');
Route::get('/item/showByCustomerId/{CustomerId}', 'ItemController@showByCustomerId');
Route::get('/entry/showByItemId/{ItemId}', 'AccountingEntryController@showByItemId');
Route::get('/item/restAmount/{ItemId}', 'ItemController@restAmount');


