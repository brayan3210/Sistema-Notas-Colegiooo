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
        Schema::table('evidencia_planilla', function (Blueprint $table) {
            $table->foreign(['id_docente'], 'evidencia_planilla_ibfk_1')->references(['id_usuario'])->on('administradores')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_grado'], 'evidencia_planilla_ibfk_2')->references(['id_grado'])->on('gradosacademicos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_periodo'], 'evidencia_planilla_ibfk_3')->references(['id_periodo'])->on('periodos_academicos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_materia'], 'evidencia_planilla_ibfk_4')->references(['id_materia'])->on('materias')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_materia_dim'], 'fk_evidplan_dim')->references(['id_materia_dim'])->on('materias_dimensiones')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evidencia_planilla', function (Blueprint $table) {
            $table->dropForeign('evidencia_planilla_ibfk_1');
            $table->dropForeign('evidencia_planilla_ibfk_2');
            $table->dropForeign('evidencia_planilla_ibfk_3');
            $table->dropForeign('evidencia_planilla_ibfk_4');
            $table->dropForeign('fk_evidplan_dim');
        });
    }
};
