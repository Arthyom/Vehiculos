<?php

use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PolloLoginController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\VehiculosController;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('login'));
});


// Route::resources([
//     'vehiculos' => VehiculosController::class,
//     'servicios' => ServiciosController::class
// ]);

Route::get('/login', [PolloLoginController::class,'index'])->name('login');
Route::post('/login', [PolloLoginController::class,'login']);
Route::get('login/logout', [PolloLoginController::class, 'logout']);

Route::post('/deployment', [DeploymentController::class, 'index']);

Route::resource( 'proveedores' , ProveedoresController::class)
    ->middleware('auth')
    ->parameters(['proveedores'=>'proveedor'])
    ;

Route::resource( 'servicios' , ServiciosController::class)
    ->middleware('auth');

Route::resource( 'vehiculos' , VehiculosController::class)
    ->middleware('auth');
