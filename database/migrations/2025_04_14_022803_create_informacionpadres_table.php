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
        Schema::create('informacionpadres', function (Blueprint $table) {
            $table->integer('id_padre', true);
            $table->string('nombres', 100);
            $table->string('numero_docu', 20);
            $table->string('municipio_expe', 100);
            $table->integer('edad');
            $table->string('parentesco', 50);
            $table->string('telefono', 15);
            $table->string('direccion', 150);
            $table->string('ocupacion', 100);
            $table->integer('id_estudiante')->index('id_estudiante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacionpadres');
    }
};
