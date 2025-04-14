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
        Schema::create('documentos_publicaciones', function (Blueprint $table) {
            $table->integer('id_documento', true);
            $table->integer('id_publicacion')->nullable()->index('id_publicacion');
            $table->string('ruta_documento')->nullable();
            $table->string('tipo_documento', 50)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos_publicaciones');
    }
};
