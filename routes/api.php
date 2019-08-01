<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1', 'middleware'=>['cors']], function(){

	Route::get('/cobrar/{token}/{pago}', 'PagoControlller@cobrar');
	
});