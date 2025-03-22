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
        Schema::table('Servicio', function (Blueprint $table) {
            $table->foreign(['Nota_Id'], 'Servicio_Nota_FK')->references(['id'])->on('Nota')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['Proveedor_Id'], 'Servicio_Proveedor_FK')->references(['id'])->on('Proveedor')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['Vehiculo_Id'], 'Servicio_Vehiculo_FK')->references(['id'])->on('Vehiculo')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Servicio', function (Blueprint $table) {
            $table->dropForeign('Servicio_Nota_FK');
            $table->dropForeign('Servicio_Proveedor_FK');
            $table->dropForeign('Servicio_Vehiculo_FK');
        });
    }
};
