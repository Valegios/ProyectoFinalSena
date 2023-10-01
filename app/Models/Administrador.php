<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User as Authenticatable;  // Importar Authenticatable
//use Illuminate\Notifications\Notifiable;

class Administrador extends Model //Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'apellido', 'email', 'celular', 'password'];//Se elimina rol

    public function Compra()
    {
        return $this->hasMany(compra::class); //Un administrador puede hacer muchas compras
    }
}
