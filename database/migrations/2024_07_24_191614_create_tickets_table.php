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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sede');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_agente')->nullable(true);
            $table->unsignedBigInteger('id_tipo_ticket');
            $table->enum('prioridad_ticket', ['baja', 'media', 'alta'])->nullable(false);
            $table->string('nombre_ticket')->nullable(false);
            $table->enum('estado_ticket', ['nuevo', 'en_proceso', 'pendiente', 'resuelto', 'cerrado'])->default('nuevo')->nullable(false);
            $table->string('asunto')->nullable(false);
            $table->boolean('estatus')->default(1)->nullable(false);
            $table->timestamps();

            $table->foreign('id_sede')->references('id')->on('sedes');
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_agente')->references('id')->on('agentes');
            $table->foreign('id_tipo_ticket')->references('id')->on('tipo_tickets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
