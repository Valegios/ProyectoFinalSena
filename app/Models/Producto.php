<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'precio', 'referencia', 'stock', 'id_proveedor'];

    public function Ventas()
    {
        return $this->belongsToMany(venta::class)->withPivot('cantidad', 'precio'); //Un producto puede estar en varias ventas
    }
}
