<?php

namespace App\Http\Controllers;

use Session;
use ErrorException;
use App\Models\Servicio;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\ServicioProvider;
use App\Providers\VehiculoProvider;
use App\Providers\ProveedorProvider;

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
        $servicio = new Servicio();

        return view('servicios.create', 
            compact('allProviders', 'allVehicles', 'servicio' )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $ok = $this->servicioProvider->create($request);
            if($ok){
                return redirect(route('servicios.index'));
            }
            else{
                throw new ErrorException('Cannot update Vehicle');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect(route('servicios.index'))->withError($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
        $allProviders = $this->proveedorProvider->index();
        $allVehicles  = $this->vehiculoProvider->index();

        return view('servicios.show', 
        compact('servicio', 'allProviders', 'allVehicles')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        //
        $allProviders = $this->proveedorProvider->index();
        $allVehicles  = $this->vehiculoProvider->index();

        return view('servicios.edit', 
        compact('servicio', 'allProviders', 'allVehicles')
    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        try {
            $ok = $this->servicioProvider->update( $request, $servicio);
            if($ok){
                return redirect(route('servicios.index'));
            }
            else{
                throw new ErrorException('Cannot update Vehicle');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect(route('servicios.index'))->withError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
