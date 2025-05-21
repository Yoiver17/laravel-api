<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resultados_torneo extends Model
{
     protected $primaryKey = "resultado_id";
        protected $fillable = [
        "resultados_id",
        "id_torneo", 
        "fehca_fin",
        "equipo_id",
        "modalidad_id",
        "premio"
        ];

        public function torneos(){
            return $this->belongsToMany(Torneo::class,"torneos","resultados_id","id_torneo");
        }
        public function equipo(){
            return $this->hasOne(Equipos::class,"equipos", "resultado_id", "equipo_id");
        }
        public function modalidad(){
            return $this->hasOne(Modalidad::class,"modalidads", "resultados_id","modalidad_id");
        }
}
