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
        Schema::create('Proveedor', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('Nombre', 50);
            $table->string('Alias', 30)->nullable();
            $table->longText('Descripcion');
            $table->dateTime('Created_At');
            $table->dateTime('Updated_At')->nullable();
            $table->string('Direccion', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Proveedor');
    }
};
