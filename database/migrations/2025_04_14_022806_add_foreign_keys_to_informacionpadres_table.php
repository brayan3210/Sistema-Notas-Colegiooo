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
        Schema::table('informacionpadres', function (Blueprint $table) {
            $table->foreign(['id_estudiante'], 'informacionpadres_ibfk_1')->references(['id_estudiante'])->on('matriculasestudiantes')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informacionpadres', function (Blueprint $table) {
            $table->dropForeign('informacionpadres_ibfk_1');
        });
    }
};
