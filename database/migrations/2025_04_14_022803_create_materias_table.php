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
        Schema::create('materias', function (Blueprint $table) {
            $table->integer('id_materia', true);
            $table->string('nombre_materia', 100);
            $table->integer('id_grado')->index('id_grado');
            $table->boolean('es_submateria')->nullable()->default(false);
            $table->integer('id_materia_padre')->nullable()->index('id_materia_padre');
            $table->decimal('porcentaje', 5)->nullable()->default(100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
