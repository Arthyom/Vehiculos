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
        Schema::create('Servicio', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('Created_At');
            $table->integer('Vehiculo_Id')->index('servicio_vehiculo_fk');
            $table->integer('Proveedor_Id')->index('servicio_proveedor_fk');
            $table->unsignedInteger('Kilometraje')->nullable();
            $table->longText('Descripcion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Servicio');
    }
};
