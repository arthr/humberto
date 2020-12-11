<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'usuario_id');
    }
}
