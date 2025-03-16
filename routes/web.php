<?php

use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\VehiculosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resources([
    'Proveedores' => ProveedoresController::class,
    'Vehiculos' => VehiculosController::class,
    'Servicios' => ServiciosController::class
]);