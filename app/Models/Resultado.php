<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resultado extends Model
{
    protected $fillable = ['estudiante_id', 'puntaje', 'fecha'];

    public function estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class);
    }
}