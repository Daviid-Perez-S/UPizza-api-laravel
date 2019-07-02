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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1/pizzas', 'middleware'=>['cors']], function(){
	Route::get('/menu','MenuController@index');
	Route::get('/menu/especialidad/{id}', 'MenuController@getDetails');
	Route::get('/order/create', 'PizzasController@create');
	Route::get('/cobrar/{token}', 'PagoControlller@cobrar');
});