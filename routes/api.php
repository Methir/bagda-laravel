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

Route::middleware('auth:api')->get('/rpgs/user', 'RpgController@index');

Route::get('rpgs', 'RpgController@index');

Route::middleware('auth:api')->get('rpgs/{id}/user', 'RpgController@show');

Route::get('rpgs/{id}', 'RpgController@show');

Route::middleware('auth:api')->get('rpgs/{id}/register', 'RpgController@register');

Route::middleware('auth:api')->post('rpgs/register/response', 'RpgController@registerResponse');

Route::middleware('auth:api')->put('rpgs/items/buy', 'ShopController@buy');

Route::middleware('auth:api')->put('rpgs/items/discard', 'PlayerController@discardItem');

Route::middleware('auth:api')->put('rpgs/requests/dismiss', 'PlayerController@dismissRequest');

Route::middleware('auth:api')->post('rpgs/update', 'RpgController@update');

Route::middleware('auth:api')->post('players/update', 'PlayerController@update');

Route::middleware('auth:api')->post('items/update', 'ShopController@updateItem');

Route::middleware('auth:api')->put('rpgs/shops/create', 'ShopController@createShop');

Route::middleware('auth:api')->put('rpgs/shops/items/create', 'ShopController@createItem');
