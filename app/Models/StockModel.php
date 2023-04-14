<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockModel extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    protected $primaryKey = 'idStock';
    protected $foreignKey = 'idProducto';
    protected $fillable = [
        'idProducto',
        'cantidad',
        'disponible',
];
public function producto()
{
    return $this->belongsTo('App\Models\ProductoModel', 'idProducto');
}
}