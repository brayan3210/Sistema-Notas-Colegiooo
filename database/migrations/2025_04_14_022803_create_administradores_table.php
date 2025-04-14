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
        Schema::create('administradores', function (Blueprint $table) {
            $table->bigInteger('id_usuario', true);
            $table->string('name');
            $table->string('email')->unique('email');
            $table->string('password');
            $table->boolean('is_admin')->comment('0:user, 1:admin,2:profesor');
            $table->boolean('force_change_password')->default(false);
            $table->integer('id_grado')->nullable()->index('id_grado');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};
