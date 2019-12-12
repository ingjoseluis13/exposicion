<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingresos';

    protected $fillable = [
        'id',
        'fecha',
        'estado',
        'id_proveedor'
    ];
}
