<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizzas extends Model
{
    protected $fillable = [
        'nombre',
        'pizza',
        'correo',
        'direccion',
        'telefono',
        'stripe_token',
        'cantidad_pizzas',
        'total'
    ];
}
