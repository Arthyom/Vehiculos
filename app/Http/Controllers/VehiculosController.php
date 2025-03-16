<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Vehiculo;
use App\Models\VehiculoImagen;
use App\Providers\ServicioProvider;
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
    protected ServicioProvider $servicioProvider;
    public function __construct(ServicioProvider $_servicioProvider)
    {
        $this->servicioProvider = $_servicioProvider;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $this->servicioProvider->
        CreateVehiculo(new Vehiculo([
            'Alias' => 'ejemplo',
            'Modelo'=> 'ejemplo',
            'Anio' => 2010,
            'Kilometraje' => 5555,
            'Placa' => 'AS$#DS#W',
            'Marca' => 'Cuyo'

        ]));
        $allVehicles = Vehiculo::all();
        return View('Vehiculos.index', compact('allVehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return View('Vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            DB::beginTransaction();
           $newVehiculo = new Vehiculo( $request->all() );
           $newVehiculo->save();

           foreach ($request->Imagen as $image) {
               $imageUuid= Str::uuid() . ".{$image->extension()}";
               $image->move( public_path('files'), $imageUuid);

               $newImage = new Imagen(  );
               $newImage->Name = $imageUuid;
               $newImage->save();

               $newVehiculoImagen = new VehiculoImagen(['Imagen_Id' => $newImage->id, 'Vehiculo_Id' => $newVehiculo->id]);
               $newVehiculoImagen->save();
            }

    
    
    
           DB::commit();
    
           return 'Ok';
        } catch (\Throwable $th) {
            //throw $th;
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
