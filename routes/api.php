<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1/pizzas', 'middleware'=>['cors']], function(){
	Route::get('/menu','MenuController@index');
	Route::get('/menu/especialidad/{id}', 'MenuController@getDetails');
	Route::get('/order/create', 'PizzasController@create');
	Route::get('/cobrar/{token}', 'PagoControlller@cobrar');
	Route::get('/ordenes', 'PizzasController@getAll');
});