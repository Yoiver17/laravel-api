<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $primaryKey = "id_torneo";
        protected $fillable = [
        "id_torneo",
        "nombre", 
        "videojuego_id",
        "premio",
        "limite_equipos",
        "modalidad"
    ];

    public function videojuego(){
        return $this->belongsTo(VideoJuego::class, "videojuego_id");
    }
    public function equipos(){
        return $this->belongsToMany(Equipos::class,"equipo_torneo","id_torneo", "equipo_id");
    }
}
