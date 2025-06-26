<?php

namespace App\Http\Controllers;

use DB;
use Str;
use ErrorException;
use App\Models\Imagen;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use App\Models\VehiculoImagen;
use Doctrine\DBAL\Schema\View;
use App\Providers\ServicioProvider;
use App\Providers\VehiculoProvider;
use Carbon\Laravel\ServiceProvider;
use App\Providers\ProveedorProvider;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request)
    {
        //
        $sessionState = session()->all();

        $per_page = $request->get('per_page') ?? 4;

        $allVehicles = Vehiculo::with('imagenes')
            ->paginate($per_page)
        ;

        $allVehicles ->getCollection()->each( function ($vehicle)  {
            $vehicle->imagenes->each( function ($imagen)  {
                $imagen->Name = asset("files/{$imagen->Name}");
                return $imagen;
            });
            return $vehicle;
        });




        // return View('vehiculos.index',
        // compact('allVehicles', 'sessionState'));


        return inertia('Vehiculo/ListIndex', [
            // 'allVehicles' =>$allVehicles,
            'sessionState' => $sessionState,
            'paginator' => $allVehicles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // if(Auth::user()->cannot('create', Vehiculo::class))
        //     abort(403,'');
        $vehiculo = new Vehiculo();
        // return View('vehiculos.create', compact(['vehiculo']));

        return inertia('Vehiculo/CreateEdit' , [
            'vehiculo' => $vehiculo,
            'asCreate' => true
        ]);
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
        // return view('vehiculos.show', compact('vehiculo'));
        $vehiculo->load('imagenes');
        $vehiculo->imagenes->each( function($image) {
            $image->Name = asset("files/{$image->Name}");
            return $image;
        });
        return inertia('Vehiculo/CreateEdit' , [
            'vehiculo' => $vehiculo,
            'asCreate' => false,
            'asShow' => true
        ]);
    }

    public function showAsJson(Vehiculo $vehiculo)
    {
        //
        // return view('vehiculos.show', compact('vehiculo'));
        $vehiculo->load('imagenes');
        $vehiculo->imagenes->each( function($image) {
            $image->Name = asset("files/{$image->Name}");
            return $image;
        });
       return response($vehiculo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {

        $vehiculo->load('imagenes');
        $vehiculo->imagenes->each( function($image) {
            $image->Name = asset("files/{$image->Name}");
            return $image;
        });

        return inertia('Vehiculo/CreateEdit' , [
            'vehiculo' => $vehiculo,
            'asCreate' => false
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        try {
            $ok = $this->vehiculoProvider->update($request, $vehiculo);
            if($ok){
                // return redirect(route(name: 'vehiculos.index'));
                return to_route('vehiculos.index');
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
        try {
            $this->vehiculoProvider->delete($vehiculo);
            return to_route('vehiculos.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect(route('vehiculos.index'))->withError($th);
        }
    }
}
