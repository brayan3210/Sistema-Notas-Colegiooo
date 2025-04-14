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
        Schema::create('matriculasestudiantes', function (Blueprint $table) {
            $table->integer('id_estudiante', true);
            $table->string('nombres');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->timestamp('fecha_nacimiento')->useCurrent();
            $table->string('lugar_nacimiento')->nullable();
            $table->string('genero')->nullable();
            $table->integer('id_documento')->nullable()->index('id_documento');
            $table->string('n_documento');
            $table->string('rh', 5)->nullable();
            $table->string('eps')->nullable();
            $table->integer('id_sisben')->nullable()->index('id_sisben');
            $table->string('estrato_social')->nullable();
            $table->string('discapacidad')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('direccion')->nullable();
            $table->string('barrio')->nullable();
            $table->string('municipio')->nullable();
            $table->string('departamento')->nullable();
            $table->integer('id_grado')->nullable()->index('id_grado');
            $table->string('estado_matricula')->default('Sin pagar');
            $table->string('documento_adjunto')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->enum('estado', ['Activo', 'Finalizado', 'Inactivo'])->nullable()->default('Activo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculasestudiantes');
    }
};
