<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaModel extends Model
{
    use HasFactory;
    protected $table = 'salidas';
    protected $primaryKey = 'idSalida';
    protected $foreignKey = 'idProducto';
    protected $fillable = [
        'fechaSalida',
        'cantidad',
        'idProducto',
    ];

    public function producto()
    {
        return $this->belongsTo('App\Models\ProductoModel', 'idProducto');
    }
}
