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
        Schema::table('historial_academico_dimensiones', function (Blueprint $table) {
            $table->foreign(['id_estudiante'], 'historial_academico_dimensiones_ibfk_1')->references(['id_estudiante'])->on('matriculasestudiantes')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_grado'], 'historial_academico_dimensiones_ibfk_2')->references(['id_grado'])->on('gradosacademicos')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historial_academico_dimensiones', function (Blueprint $table) {
            $table->dropForeign('historial_academico_dimensiones_ibfk_1');
            $table->dropForeign('historial_academico_dimensiones_ibfk_2');
        });
    }
};
