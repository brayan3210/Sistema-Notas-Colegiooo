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
        Schema::table('fotos_publicaciones', function (Blueprint $table) {
            $table->foreign(['id_publicacion'], 'fotos_publicaciones_ibfk_1')->references(['id_publicacion'])->on('publicaciones')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fotos_publicaciones', function (Blueprint $table) {
            $table->dropForeign('fotos_publicaciones_ibfk_1');
        });
    }
};
