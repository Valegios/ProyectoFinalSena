<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'cantidad', 'precio', 'stock', 'id_administrador', 'id_producto'];

    public function producto()
    {
        return $this->hasMany(producto::class);
    }
}
