<?php

namespace App\Providers;

use App\Models\Imagen;
use App\Models\Vehiculo;
use Exception;
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

    function update(Request $request, Vehiculo $vehiculo) : bool {

        DB::beginTransaction();

        $this->insertImages($request, $vehiculo->id);
        $newVehiculo = $vehiculo->update($request->all());

        DB::commit();

        return $newVehiculo;
    }

    private function insertImages(Request $request, int $vehiculoId) : void {
        if($request->Imagen){
            foreach ($request->Imagen as $image) {
                $imageUuid= Str::uuid() . ".{$image->extension()}";
                $image->move( public_path('files'), $imageUuid);

                $newImage = new Imagen(  );
                $newImage->Name = $imageUuid;
                $newImage->save();

                $newVehiculoImagen = new VehiculoImagen(['Imagen_Id' => $newImage->id, 'Vehiculo_Id' => $vehiculoId]);
                $newVehiculoImagen->save();
             }
        }
    }

    public function create(Request $request) : Vehiculo {

        DB::beginTransaction();
        $newVehiculo = new Vehiculo( $request->all() );
        $newVehiculo->save();

        $this->insertImages($request, $newVehiculo->id);

        DB::commit();

        $newVehiculo->save();
        return $newVehiculo;
    }

    public function index(): Collection {
       return Vehiculo::all();
    }

    public function delete(Vehiculo $vehicle) : bool {
        DB::beginTransaction();
        $response = $vehicle->delete();

        if(!$response)
            throw new Exception("Error runing soft deleting");

        DB::commit();

        return $response;
    }
}
