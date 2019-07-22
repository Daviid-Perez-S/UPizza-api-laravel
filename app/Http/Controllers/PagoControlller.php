<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Pizzas;// órdenes

class PagoControlller extends Controller
{
    public static function cobrar($token_compra, $monto)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $customer = Customer::create(array(
            'email' => 'test@ids.com',
            'source'  => $token_compra
        ));

        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => round($monto, 2),
            'currency' => 'MXN'
        ));

        return response()->json(
            [
                'OK'
            ]
            ,200
        );
    }
}
