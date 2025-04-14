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
        Schema::create('notas_dimensiones', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_estudiante')->index('id_estudiante');
            $table->integer('id_materia_dim')->index('id_materia_dim');
            $table->integer('id_periodo')->index('id_periodo');
            $table->enum('desempeno', ['Bajo', 'Básico', 'Alto', 'Superior'])->nullable();
            $table->integer('fallas')->default(0);
            $table->json('capacidades')->nullable();
            $table->text('comportamiento')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas_dimensiones');
    }
};
