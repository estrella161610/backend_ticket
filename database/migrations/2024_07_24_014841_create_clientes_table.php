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
            $table->id();
            $table->unsignedBigInteger('id_usuario')->nullable(false);
            $table->unsignedBigInteger('id_sede')->nullable(false);
            $table->string('icono')->nullable(true);
            $table->string('nombre_completo')->nullable(false);
            $table->string('nombre_corto', 12)->nullable(false);
            $table->string('telefono', 16)->unique()->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('observaciones')->nullable();
            $table->boolean('estatus')->default(1)->nullable(false);
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('agentes');
            $table->foreign('id_sede')->references('id')->on('sedes');
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
