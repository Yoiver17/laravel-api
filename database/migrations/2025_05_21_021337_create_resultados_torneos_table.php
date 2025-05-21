<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resultados_torneos', function (Blueprint $table) {
            $table->id('resultados_id');
            $table->unsignedBigInteger('id_torneo');
            $table->date('fehca_fin');
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('modalidad_id');
            $table->string('premio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados_torneos');
    }
};
