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
        Schema::create('fotos_publicaciones', function (Blueprint $table) {
            $table->integer('id_foto', true);
            $table->integer('id_publicacion')->nullable()->index('id_publicacion');
            $table->string('ruta_foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotos_publicaciones');
    }
};
