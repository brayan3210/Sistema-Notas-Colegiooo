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
        Schema::table('matriculasestudiantes', function (Blueprint $table) {
            $table->foreign(['id_sisben'], 'matriculasestudiantes_ibfk_1')->references(['id_sisben'])->on('sisben')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['id_documento'], 'matriculasestudiantes_ibfk_2')->references(['id_documento'])->on('documentotipo')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['id_grado'], 'matriculasestudiantes_ibfk_3')->references(['id_grado'])->on('gradosacademicos')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matriculasestudiantes', function (Blueprint $table) {
            $table->dropForeign('matriculasestudiantes_ibfk_1');
            $table->dropForeign('matriculasestudiantes_ibfk_2');
            $table->dropForeign('matriculasestudiantes_ibfk_3');
        });
    }
};
