<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn("name", "nombre");
            $table->renameColumn("email", "correo");
            $table->renameColumn("email_verified_at", "correo_verificado_el");
            $table->renameColumn("password", "clave");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn("nombre", "name");
            $table->renameColumn("correo", "email");
            $table->renameColumn("correo_verificado_el", "email_verified_at");
            $table->renameColumn("clave", "password");
        });
    }
};
