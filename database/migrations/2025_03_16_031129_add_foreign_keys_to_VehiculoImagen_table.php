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
        Schema::table('VehiculoImagen', function (Blueprint $table) {
            $table->foreign(['Imagen_Id'], 'VehiculoImagen_Imagen_FK')->references(['id'])->on('Imagen')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['Vehiculo_Id'], 'VehiculoImagen_Vehiculo_FK')->references(['id'])->on('Vehiculo')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('VehiculoImagen', function (Blueprint $table) {
            $table->dropForeign('VehiculoImagen_Imagen_FK');
            $table->dropForeign('VehiculoImagen_Vehiculo_FK');
        });
    }
};
