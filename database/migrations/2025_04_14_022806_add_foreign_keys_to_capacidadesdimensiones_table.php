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
        Schema::table('capacidadesdimensiones', function (Blueprint $table) {
            $table->foreign(['id_materia_dim'], 'capacidadesdimensiones_ibfk_1')->references(['id_materia_dim'])->on('materias_dimensiones')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('capacidadesdimensiones', function (Blueprint $table) {
            $table->dropForeign('capacidadesdimensiones_ibfk_1');
        });
    }
};
