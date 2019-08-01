<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class PagoControlller extends Controller
{
    public static function cobrar($token_compra, $monto)
    {
        // dd($token_compra);   // Imprimir algo

        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $customer = Customer::create(array(
                'email' => 'test@ids.com',
                'source'  => $token_compra
            ));
    
            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount'   => intval($monto),
                'currency' => 'MXN'
            ));
    
            return response()->json(
                [
                    'OK'
                ]
                ,200
            );
        } catch (Exception $e) {
            return response()->json([
                $e->getMessage()
            ], 200);
        }
    }
}
