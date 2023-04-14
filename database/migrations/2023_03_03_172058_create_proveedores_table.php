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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('idProveedor');
            $table->string('razonSocial');
            $table->string('nombreCompleto');
            $table->string('direccion');
            $table->string('telefono', 15);
            $table->string('correo')->array_unique();
            $table->string('rfc', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
