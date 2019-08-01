<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1', 'middleware'=>['cors']], function(){
	Route::get('/menu','MenuController@index');
	Route::get('/menu/especialidad/{id}', 'MenuController@getDetails');
	Route::get('/order/create', 'PizzasController@create');
	Route::get('/cobrar/{token}/{pago}', 'PagoControlller@cobrar');
	Route::get('/ordenes', 'PizzasController@getAll');
	
});