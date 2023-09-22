<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'precio', 'referencia', 'stock', 'id_proveedor'];

    public function venta()
    {
        return $this->hasMany(venta::class); //Un producto puede ser vendido muchas veces
    }
}
