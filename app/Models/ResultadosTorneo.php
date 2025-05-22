<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultadosTorneo extends Model
{
     protected $primaryKey = "resultados_id";
        protected $fillable = [
        "resultados_id",
        "id_torneo", 
        "fehca_fin",
        "equipo_id",
        "modalidad_id",
        "premio"
        ];

        public function torneo(){
            return $this->belongsTo(Torneo::class,"id_torneo");
        }
        public function equipo(){
            return $this->belongsTo(Equipos::class,"equipo_id");
        }
        public function modalidad(){
            return $this->belongsTo(Modalidad::class,"modalidad_id");
        }
}
