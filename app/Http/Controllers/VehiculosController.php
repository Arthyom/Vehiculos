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
use ErrorException;

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
        $sessionState = session()->all();
        $allVehicles = Vehiculo::all();
        return View('vehiculos.index', 
        compact('allVehicles', 'sessionState'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $vehiculo = new Vehiculo();
        return View('vehiculos.create', compact(['vehiculo']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $ok = $this->vehiculoProvider->create($request);
            if($ok){
                return redirect(route(name: 'vehiculos.index'));
            }
            else{
                throw new ErrorException('Cannot update Vehicle');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect(route('vehiculos.index'))->withError($th);
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //
        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        //
        return view('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        try {
            $ok = $this->vehiculoProvider->update($request, $vehiculo);
            if($ok){
                return redirect(route(name: 'vehiculos.index'));
            }
            else{
                throw new ErrorException('Cannot update Vehicle');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect(route('vehiculos.index'))->withError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        //
    }
}
