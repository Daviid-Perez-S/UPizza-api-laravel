<?php

namespace App\Http\Controllers;

use App\Pizzas;
use Illuminate\Http\Request;

class PizzasController extends Controller
{
    /**
     * Registrar una orden nueva
     *
     * @param   Request  $r  datos
     *
     * @return  json       OK
     */
    public function create(Request $r)
    {
        $new = Pizzas::create([
            'nombre' => $r->nombre,
            'pizza' => $r->pizza,
            'correo' => $r->correo,
            'direccion' => $r->direccion,
            'telefono' => $r->telefono,
            'stripe_token' => $r->stripe_token,
            'cantidad_pizzas' => $r->cantidad_pizzas,
            'total' => $r->total
        ]);

        if($new)
        {
            return response()->json([
                'OK'
            ],200);
        }
    }
}
