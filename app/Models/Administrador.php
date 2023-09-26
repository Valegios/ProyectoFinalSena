<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'apellido', 'email', 'celular', 'password'];

    public function compra()
    {
        return $this->hasMany(compra::class); //Un administrador puede hacer muchas compras
    }
}
