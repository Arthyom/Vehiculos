<?php

namespace App\Providers;

use App\Models\Vehiculo;
use Illuminate\Support\ServiceProvider;

class ServicioProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
        $this->app->bind(ServicioProvider::class,function (){
            return new ServicioProvider($this->app);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }


    public function CreateVehiculo(Vehiculo $newItem) : bool 
    {
        $newItem->save();
        return true;
    }
}
