<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenador extends Model
{
    use HasFactory;

    protected $table = 'ordenadores';

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function dispositivos()
    {
        return $this->morphMany(Dispositivo::class, 'colocable');
    }
}
