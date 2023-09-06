<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'email', 'contraseña'];

    public function venta()
    {
        return $this->hasMany(venta::class); //Un vendedor puede realizar muchas ventas
    }
}
