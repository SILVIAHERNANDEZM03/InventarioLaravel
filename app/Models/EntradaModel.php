<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaModel extends Model
{
    use HasFactory;
    protected $table = 'entradas';
    protected $primaryKey = 'idEntrada';
    protected $foreignKey = 'idProducto';
    protected $fillable = [
        'fechaEntrada',
        'cantidad',
        'idProducto',
    ];

    public function producto()
    {
        return $this->belongsTo('App\Models\ProductoModel', 'idProducto');
    }

}
