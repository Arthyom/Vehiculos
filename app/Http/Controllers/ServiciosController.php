<?php

namespace App\Http\Controllers;

use App\Models\TipoServicio;
use Inertia\Inertia;
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
    public function index(Request $request)
    {
       $perPage = $request->get('per_page') ?? 4;
       $paginatedData = $this->servicioProvider->paginate($perPage);


       return inertia('Servicio/ListIndex', [
        'paginator' => $paginatedData
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $allProviders = $this->proveedorProvider->index()
            ->map( function($provider){
                return [
                    'Id' => $provider->id,
                    'label' => "{$provider->Alias} - {$provider->Nombre}"
                ];
        });
        $allVehicles  = $this->vehiculoProvider->index()
            ->map( function ($vehicle){
                return [
                    'Id' => $vehicle->id,
                    'label' => "{$vehicle->Marca} {$vehicle->Modelo} {$vehicle->Anio} - {$vehicle->Alias}"
                ];
            } );

        $allServiceTypes = TipoServicio::all()
            ->map( function ($ts){
                return[
                    'Id' => $ts->id,
                    'label' => $ts->Descripcion
                ];
            });
        $servicio = new Servicio();

        // return view('servicios.create',
        //     compact('allProviders', 'allVehicles', 'servicio' )
        // );

        return inertia('Servicio/CreateEdit', [
            'servicio' => $servicio,
            'vehicles' => $allVehicles,
            'providers' => $allProviders,
            'tipoServicio' => $allServiceTypes,
            'asCreate' => true
        ]);
    }

    /**
     * Show paginated list of vehicle's services
     */
    public function services(Vehiculo $vehiculo, Request $request)  {
        try {
            $pp = $request->get('per_page') ?? 4;
            $paginator = $this->servicioProvider->paginateByVehiculo($vehiculo->id, $pp);

            return Inertia::render('Servicio/ByVehicle',[
                'paginator' => $paginator,
                'vehicle' => $vehiculo
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
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
        $allProviders = $this->proveedorProvider->index()
        ->map( function($provider){
            return [
                'Id' => $provider->id,
                'label' => "{$provider->Alias} - {$provider->Nombre}"
            ];
        });
        $allVehicles  = $this->vehiculoProvider->index()
        ->map( function ($vehicle){
            return [
                'Id' => $vehicle->id,
                'label' => "{$vehicle->Marca} {$vehicle->Modelo} {$vehicle->Anio} - {$vehicle->Alias}"
            ];
        } );

        $allServiceTypes = TipoServicio::all()
            ->map( function ($ts){
                return[
                    'Id' => $ts->id,
                    'label' => $ts->Descripcion
                ];
            });

        $servicio->load('nota');

    // return view('servicios.create',
    //     compact('allProviders', 'allVehicles', 'servicio' )
    // );

        return inertia('Servicio/CreateEdit', [
            'servicio' => $servicio,
            'vehicles' => $allVehicles,
            'providers' => $allProviders,
            'tipoServicio' => $allServiceTypes,
            'asShow' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        $allProviders = $this->proveedorProvider->index()
            ->map( function($provider){
                return [
                    'Id' => $provider->id,
                    'label' => "{$provider->Alias} - {$provider->Nombre}"
                ];
        });
        $allVehicles  = $this->vehiculoProvider->index()
            ->map( function ($vehicle){
                return [
                    'Id' => $vehicle->id,
                    'label' => "{$vehicle->Marca} {$vehicle->Modelo} {$vehicle->Anio} - {$vehicle->Alias}"
                ];
            } );

        $allServiceTypes = TipoServicio::all()
            ->map( function ($ts){
                return[
                    'Id' => $ts->id,
                    'label' => $ts->Descripcion
                ];
            });

        $servicio->load('nota');

        // return view('servicios.create',
        //     compact('allProviders', 'allVehicles', 'servicio' )
        // );

        return inertia('Servicio/CreateEdit', [
            'servicio' => $servicio,
            'vehicles' => $allVehicles,
            'providers' => $allProviders,
            'tipoServicio' => $allServiceTypes,
            'asCreate' => false
        ]);
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
