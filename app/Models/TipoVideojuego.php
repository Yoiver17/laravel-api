<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVideojuego extends Model
{
    protected $primaryKey = "tipo_id";
    protected $fillable =[
        "tipo_id",
        "tipo"
    ];
   public function videojuego(){
    return $this->hasMany(VideoJuego::class,"tipo_id");
   }
}
