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
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('idCliente');
            $table->string('nombre', 50);
            $table->string('apellidoPaterno', 50);
            $table->string('apellidoMaterno', 50);
            $table->string('rfc', 13);
            $table->string('telefono', 15);
            $table->string('correo')->unique();
            $table->string('direccion');
            $table->integer('idProducto')->unsigned();
            $table->foreign('idProducto')->references('idProducto')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
