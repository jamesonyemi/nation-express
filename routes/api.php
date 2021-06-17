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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('nations', 'API\NationFlagController@index');
Route::group(['prefix' => 'nat-flag'], function () {
    // Route::post('add', 'API\NationFlagController@add');
    Route::get('show/{id}', 'API\NationFlagController@show');
    // Route::post('update/{id}', 'API\NationFlagController@update');
    // Route::delete('delete/{id}', 'API\NationFlagController@delete');
});
