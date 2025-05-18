<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Equipos extends Model
{
    use SoftDeletes;
    protected $primaryKey = "equipo_id";
    protected $fillable = [
        "equipo_id",
        "nombre", 
        "lider_id"
        
    ];

    public function lider(){
        return $this->belongsTo(Jugadores::class, "id_jugador");
    }

    public function torneos(){
        return $this->belongsToMany(Torneo::class,"equipo_torneo", "equipo_id","id_torneo");
    }
    public function jugadores(){
        return $this->belongsToMany(Jugadores::class,"equipo_jugador", "equipo_id","id_jugador");
    }
}

