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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sede');
            $table->unsignedBigInteger('id_departamento');
            $table->string('nombre')->nullable(false);
            $table->text('descripcion')->nullable(false);
            $table->boolean('estatus')->default(1)->nullable(false);
            $table->timestamps();

            $table->foreign('id_sede')->references('id')->on('sedes');
            $table->foreign('id_departamento')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
