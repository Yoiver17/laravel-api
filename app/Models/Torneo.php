<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $primaryKey = "id_torneo";
        protected $fillable = [
        "id_torneo",
        "nombre", 
         "premio",
         "fecha_inicio",
         "fecha_fin",
        "videojuego_id",
        "limite_equipos",
        "modalidad"
    ];

    public function videojuego(){
        return $this->belongsTo(VideoJuego::class, "videojuego_id");
    }
    public function equipos(){
        return $this->belongsToMany(Equipos::class,"equipo_torneo","id_torneo", "equipo_id");
    }
    public function resultado(){
        return $this->belongsTo(ResultadosTorneo::class,"resultados_torneo","id_torneo","resultados_id");
    }
}
