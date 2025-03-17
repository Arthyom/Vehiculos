<?php

namespace App\Providers;

use App\Models\Servicio;
use App\Models\Vehiculo;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

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

        $vehiculo->Kilometraje = $newServicio->Kilometraje;

        $newServicio->save();
        $vehiculo->save();

        DB::commit();

        return $newServicio;
    }

    public function index(): Collection {
       return Servicio::all();
    }
}
