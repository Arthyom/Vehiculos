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
        Schema::create('Rol', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('codigo',20);
            $table->string('nombre',20);
            $table->string('descripcion',30);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Rol');
    }
};
