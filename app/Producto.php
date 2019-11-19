<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'estado',
        'id_categoria'
    ];


    public $timestamps = false;
}
