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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes();

Route::post('/storemotel', 'MotelController@storeMotel');
Route::post('getmotel', 'MotelController@getMotel');
Route::get('getdistrict', 'MotelController@getDistrict');
Route::get('getuser', 'UserController@current_user');
Route::post('/search', 'MotelController@searchMotel');
