<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    public function ordenadores()
    {
        return $this->hasMany(Ordenador::class);
    }

    public function cambios()
    {
        return $this->hasMany(Cambio::class);
    }

    public function origen()
    {
        return $this->belongsTo(Cambio::class, 'origen_id');
    }

    public function destino()
    {
        return $this->belongsTo(Cambio::class, 'destino_id');
    }

    public function dispositivos()
    {
        return $this->morphMany(Dispositivo::class, 'colocable');
    }


}
