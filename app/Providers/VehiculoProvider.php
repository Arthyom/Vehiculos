<?php

namespace App\Providers;

use App\Models\Imagen;
use App\Models\Vehiculo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VehiculoImagen;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class VehiculoProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(VehiculoProvider::class, function(){
            return new VehiculoProvider($this->app);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }


    public function create(Request $request) : Vehiculo {

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

        $newVehiculo->save();
        return $newVehiculo;
    }

    public function index(): Collection {
       return Vehiculo::all();
    }
}
