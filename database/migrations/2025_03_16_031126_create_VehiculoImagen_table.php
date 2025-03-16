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
        Schema::create('VehiculoImagen', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('Vehiculo_Id')->index('vehiculoimagen_vehiculo_fk');
            $table->integer('Imagen_Id')->index('vehiculoimagen_imagen_fk');
            $table->dateTime('Created_At');
            $table->dateTime('Updated_At')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('VehiculoImagen');
    }
};
