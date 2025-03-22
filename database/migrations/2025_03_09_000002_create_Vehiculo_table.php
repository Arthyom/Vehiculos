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
        Schema::create('Vehiculo', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('Created_At');
            $table->string('Marca', 20);
            $table->string('Modelo', 20);
            $table->unsignedInteger('Anio');
            $table->string('Placa', 20);
            $table->string('Alias', 30)->nullable();
            $table->unsignedInteger('Kilometraje')->nullable();
            $table->dateTime('Updated_At')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Vehiculo');
    }
};
