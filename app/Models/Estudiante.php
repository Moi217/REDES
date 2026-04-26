<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estudiante extends Model
{
    protected $fillable = ['nombre', 'correo'];

    public function resultados(): HasMany
    {
        return $this->hasMany(Resultado::class);
    }
}