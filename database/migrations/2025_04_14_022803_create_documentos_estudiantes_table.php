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
        Schema::create('documentos_estudiantes', function (Blueprint $table) {
            $table->integer('id_documento', true);
            $table->integer('id_estudiante')->index('id_estudiante');
            $table->string('fotocopia_registro_civil')->nullable();
            $table->string('fotocopia_carnet_vacunas')->nullable();
            $table->string('fotocopia_carnet_covid')->nullable();
            $table->string('fotocopia_carnet_crecimiento')->nullable();
            $table->string('certificado_eps')->nullable();
            $table->string('certificado_medico_visual_auditivo')->nullable();
            $table->string('fotocopia_documento_padres_acudiente')->nullable();
            $table->string('fotocopia_observador_estudiante')->nullable();
            $table->string('boletin_anterior')->nullable();
            $table->string('paz_salvo_anterior')->nullable();
            $table->string('certificado_grado_quinto')->nullable();
            $table->string('retiro_simat')->nullable();
            $table->string('fotos_3x4')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos_estudiantes');
    }
};
