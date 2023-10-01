<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'precio','id_vendedor']; //posible cambio por: 'user_id'

    // Una venta pertenece a un vendedor
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'id_vendedor'); //Una venta solo puede ser realizada por un vendendor
    }

    // Una venta puede tener varios productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot('cantidad', 'precio');
    }
}
