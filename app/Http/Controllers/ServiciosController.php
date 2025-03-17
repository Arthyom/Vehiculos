<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Vehiculo;
use App\Providers\ProveedorProvider;
use App\Providers\ServicioProvider;
use App\Providers\VehiculoProvider;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{

    public function __construct(
        private ServicioProvider $servicioProvider, 
        private VehiculoProvider $vehiculoProvider, 
        private ProveedorProvider $proveedorProvider
        ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $allServices = $this->servicioProvider->index();
       return view('servicios.index', compact('allServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $allProviders = $this->proveedorProvider->index();
        $allVehicles  = $this->vehiculoProvider->index();

        return view('servicios.create', 
            compact('allProviders', 'allVehicles')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->servicioProvider->create($request);
        return redirect( route('servicios.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
