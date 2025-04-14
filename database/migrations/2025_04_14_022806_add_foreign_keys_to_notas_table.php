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
        Schema::table('notas', function (Blueprint $table) {
            $table->foreign(['id_estudiante'], 'notas_ibfk_1')->references(['id_estudiante'])->on('matriculasestudiantes')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_materia'], 'notas_ibfk_2')->references(['id_materia'])->on('materias')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_periodo'], 'notas_ibfk_3')->references(['id_periodo'])->on('periodos_academicos')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->dropForeign('notas_ibfk_1');
            $table->dropForeign('notas_ibfk_2');
            $table->dropForeign('notas_ibfk_3');
        });
    }
};
