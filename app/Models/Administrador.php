<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'email', 'celular', 'contraseña' ];

    public function compra()
    {
        return $this->hasMany(compra::class);
    }
}
