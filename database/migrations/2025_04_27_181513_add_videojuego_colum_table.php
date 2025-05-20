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
        Schema::table("torneos", function (Blueprint $table) {
            $table->bigInteger("videojuego_id")->unsigned()
            ->nullable()->after("id_torneo");

            $table->foreign("videojuego_id")->references("videojuego_id")->on("video_juegos")
            ->onUpdate("cascade")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
