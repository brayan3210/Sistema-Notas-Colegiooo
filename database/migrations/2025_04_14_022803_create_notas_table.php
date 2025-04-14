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
        Schema::create('notas', function (Blueprint $table) {
            $table->integer('id_nota', true);
            $table->integer('id_estudiante');
            $table->integer('id_materia')->index('id_materia');
            $table->integer('id_periodo')->index('id_periodo');
            $table->decimal('nota', 4)->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamp('fecha_registro')->nullable()->useCurrent();

            $table->unique(['id_estudiante', 'id_materia', 'id_periodo'], 'unique_nota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
