<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'id',
        'nombre',
        'direccion',
        'telefono'
    ];


    public $timestamps = false;
}
