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
        Schema::create('evidencia_planilla', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('id_docente')->index('id_docente');
            $table->integer('id_grado')->index('id_grado');
            $table->integer('id_periodo')->index('id_periodo');
            $table->integer('id_materia')->nullable()->index('id_materia');
            $table->integer('id_materia_dim')->nullable()->index('fk_evidplan_dim');
            $table->string('file_path');
            $table->string('file_type', 50)->comment('pdf o image');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidencia_planilla');
    }
};
