<?php

use App\Http\Controllers\EquiposController;
use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\TipoVideojuegoController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\VideoJuegoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sena', function (Request $request) {
    $mensaje = "Hola Mundo";
    return response([
        "saludo" => $mensaje
    ]);
});

Route::post("/create-tournament", [TorneoController::class, 'create']);

Route::post("/create-tournament/{videojuego}", [TorneoController::class, 'createWithGame']);
Route::get("tournament/{torneo}", [TorneoController::class, "show"]);
Route::post("/equipos",[TorneoController::class,'create']);
Route::post("/crearequipos", [EquiposController::class,"create"]);
Route::post("/crearjugador", [JugadoresController::class,"create"]);
Route::post("/crearmod", [ModalidadController::class,"create"] );
Route::post("/creartipo", [TipoVideojuegoController::class,"create"]);
Route::post("/creategame", [VideoJuegoController::class,"create"]);
Route::get("/listar-equipos", [EquiposController::class,"getAll"]);
Route::put("/actulizar-equipo/{equipo}", [EquiposController::class,"update"]);
Route::delete("/eliminar-equipo/{equipo}", [EquiposController::class,"destroy"]);
Route::put("/actualizar-jugador/{jugador}", [JugadoresController::class,"update"]);