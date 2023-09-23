<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'direccion', 'telefono', 'email'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_proveedor'); // Un proveedor puede tener muchos productos
    }

}
