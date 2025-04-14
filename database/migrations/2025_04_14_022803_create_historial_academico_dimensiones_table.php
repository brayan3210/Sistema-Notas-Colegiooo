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
        Schema::create('historial_academico_dimensiones', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_estudiante')->index('id_estudiante');
            $table->integer('id_grado')->index('id_grado');
            $table->integer('anio');
            $table->text('dimensiones_json');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_academico_dimensiones');
    }
};
