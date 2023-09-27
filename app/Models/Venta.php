<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'precio','id_vendedor'];

    public function vendedor()
    {
        return $this->hasOne(vendedor::class); //Una venta solo puede ser realizada por un vendendor
    }
}
