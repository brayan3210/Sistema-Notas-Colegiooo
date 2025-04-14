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
        Schema::table('documentos_publicaciones', function (Blueprint $table) {
            $table->foreign(['id_publicacion'], 'documentos_publicaciones_ibfk_1')->references(['id_publicacion'])->on('publicaciones')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documentos_publicaciones', function (Blueprint $table) {
            $table->dropForeign('documentos_publicaciones_ibfk_1');
        });
    }
};
