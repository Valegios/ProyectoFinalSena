<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'apellido', 'email', 'password'];

    public function venta()
    {
        return $this->hasMany(venta::class); //Un vendedor puede realizar muchas ventas
    }
}
