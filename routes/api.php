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
Route::post('create', 'App\Http\Controllers\API\BookController@store');
Route::put('update/{id}', 'App\Http\Controllers\API\BookController@update');

Route::get('record/{id}', 'App\Http\Controllers\API\BookController@record');
Route::get('list', 'App\Http\Controllers\API\BookController@list');
Route::get('search/{type}/{param}', 'App\Http\Controllers\API\BookController@search');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
