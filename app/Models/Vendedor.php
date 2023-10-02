<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'apellido', 'email', 'password', 'rol']; //Se elimina rol

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_vendedor'); //Un vendedor puede realizar varias ventas
    }

}
