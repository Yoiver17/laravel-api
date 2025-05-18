<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoJuego extends Model
{
    protected $primaryKey = "videojuego_id";
    protected $fillable = [
        "videojuego_id",
        "nombre",
        "tipo_id"
    ];

    public function modalidades(){
        return $this->belongsToMany(Modalidad::class,"modalidad_videojuego","videojuego_id","modalidad_id");
    }
    public function tipo(){
        return $this->belongsTo(TipoVideojuego::class,"tipo_id");
    }
}
