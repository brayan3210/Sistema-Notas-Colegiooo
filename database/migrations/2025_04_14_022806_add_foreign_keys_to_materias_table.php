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
        Schema::table('materias', function (Blueprint $table) {
            $table->foreign(['id_grado'], 'materias_ibfk_1')->references(['id_grado'])->on('gradosacademicos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_materia_padre'], 'materias_ibfk_2')->references(['id_materia'])->on('materias')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materias', function (Blueprint $table) {
            $table->dropForeign('materias_ibfk_1');
            $table->dropForeign('materias_ibfk_2');
        });
    }
};
