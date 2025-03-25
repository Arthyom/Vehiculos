<?php

namespace App\Providers;

use App\Models\Nota;
use App\Models\Servicio;
use App\Models\Vehiculo;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Str;

class ServicioProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
        $this->app->bind(ServicioProvider::class,function (Application $app){
            return new ServicioProvider($app);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }


    public function create(Request $request) : Servicio {

        DB::beginTransaction();

        $newServicio = new Servicio($request->all());
        $vehiculo = Vehiculo::findOrFail($request->input('Vehiculo_Id'));

        $nota = $this->insertNota($request);
        if($nota)
            $newServicio->Nota_Id = $nota->id;

        $vehiculo->Kilometraje = $newServicio->Kilometraje;
        $newServicio->save();
        $vehiculo->save();

        DB::commit();

        return $newServicio;
    }

    public function update(Request $request, Servicio $servicio) : bool {
        DB::beginTransaction();
        
        $nota = $this->insertNota($request);

        if($nota){
            $servicio->Nota_Id = $nota->id;
        }
        
        $updateServicio = $servicio->update($request->all());
        DB::commit();
        return $updateServicio;
    }

    public function index(): Collection {
       return Servicio::all();
    }

    private function insertNota(Request $request) : Nota | null{
        if( $request->Nota){
            $imageName = Str::uuid() .".{$request->Nota->extension()}";
            $request->Nota->move(public_path( 'files' ), $imageName);
            $image = new Nota(['Name'=>$imageName]);
            $image->save();
            return $image;
        }

        return null;
    }
}
