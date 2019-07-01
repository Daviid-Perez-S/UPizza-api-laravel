<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Pizzas;// órdenes

class PagoControlller extends Controller
{
    public static function cobrar($token_compra)
    {
        // Obtener los datos de la comrpa realizada
        $compra = Pizzas::where('stripe_token', $token_compra)->first();
        if(count($compra) > 0)
        {
            Stripe::setApiKey(config('services.stripe.secret'));
            $customer = Customer::create(array(
                'email' => $compra->correo,
                'source'  => $token_compra
            ));
    
            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount'   => round($compra->total, 2),
                'currency' => 'MXN'
            ));

            return response()->json(
                [
                    'OK'
                ]
                ,200
            );
        }
        else
        {
            return response()->json([
                'No se encuentra la orden seleccionada'
            ],404);
        }
    }
}
