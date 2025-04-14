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
        Schema::table('notas_dimensiones', function (Blueprint $table) {
            $table->foreign(['id_estudiante'], 'notas_dimensiones_ibfk_1')->references(['id_estudiante'])->on('matriculasestudiantes')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_materia_dim'], 'notas_dimensiones_ibfk_2')->references(['id_materia_dim'])->on('materias_dimensiones')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_periodo'], 'notas_dimensiones_ibfk_3')->references(['id_periodo'])->on('periodos_academicos')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notas_dimensiones', function (Blueprint $table) {
            $table->dropForeign('notas_dimensiones_ibfk_1');
            $table->dropForeign('notas_dimensiones_ibfk_2');
            $table->dropForeign('notas_dimensiones_ibfk_3');
        });
    }
};
