<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Vehiculo;
use App\Models\VehiculoImagen;
use App\Providers\ProveedorProvider;
use App\Providers\ServicioProvider;
use App\Providers\VehiculoProvider;
use Carbon\Laravel\ServiceProvider;
use DB;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Str;

class VehiculosController extends Controller
{
   
    /**
     * Class constructor.
     */
    public function __construct(private VehiculoProvider $vehiculoProvider)
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $allVehicles = Vehiculo::all();
        return View('vehiculos.index', compact('allVehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return View('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $this->vehiculoProvider->create($request);
            return  redirect( route('vehiculos.index') );
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        //
    }
}
