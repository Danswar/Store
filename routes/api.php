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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */

//List single product
Route::get('product/{id}', 'ProductController@show')->where('id', '[0-9]+');

Route::get('products', 'ProductController@index');

//Create new product
Route::post('product',  'ProductController@store');

//Update product
Route::put('product', 'ProductController@store');

//Delete product
Route::post('product/{id}', 'ProductController@destroy');


Route::get('sells', 'SellController@index');

Route::get('sell/{id}', 'SellController@show')->where('id', '[0-9]+');

Route::post('sell', 'SellController@store');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => ['jwt.verify','api']], function() {
        Route::get('testToken', function(){
            return "Hola test Token";
        });
});

