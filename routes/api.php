<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1', 'middleware'=>['cors']], function(){

	// Ruta para los pagos

	Route::get('/cobrar/{token}/{pago}', 'PagoControlller@cobrar');
	
});