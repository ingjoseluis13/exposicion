<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table = 'detalle_ingresos';

    protected $fillable = [
        'id_ingreso',
        'id_producto',
        'cantidad',
        'precio_compra',
        'precio_venta'
    ];


    public $timestamps = false;
}
