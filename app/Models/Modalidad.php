<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $primaryKey = "modalidad_id";
    protected $fillable =[
            "modalidad_id",
            "nombre"
    ];

    public function videojuegos(){
        return $this->belongsToMany(VideoJuego::class,"modalidad_videojuego", "videojuego_id");
    }
}
