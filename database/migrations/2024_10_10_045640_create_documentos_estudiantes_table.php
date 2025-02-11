<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosEstudiantesTable extends Migration
{
    public function up()
    {
        Schema::create('documentos_estudiantes', function (Blueprint $table) {
            $table->id('id_documento');
            $table->unsignedBigInteger('id_estudiante');
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
            $table->string('certificado_grado_quinto')->nullable();  // opcional
            $table->string('retiro_simat')->nullable();
            $table->string('fotos_3x4')->nullable();  // JPG o PNG

            $table->foreign('id_estudiante')->references('id_estudiante')->on('matriculasestudiantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documentos_estudiantes');
    }
}
