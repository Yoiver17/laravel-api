<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use Illuminate\Http\Request;

class ModalidadController extends Controller
{
    
    public function create(Request $request){
        Modalidad::create([
            "modalidad_id" => $request->modalidad_id,
            "nombre" => $request->nombre,
        ]);
        return response()->json([
            "message" => "Registro exitoso"
            ],201);
    }


}
