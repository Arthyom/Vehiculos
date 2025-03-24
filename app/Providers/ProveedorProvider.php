<?php

namespace App\Providers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class ProveedorProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ProveedorProvider::class,function (Application $app) {
            return new ProveedorProvider($app);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function create(Request $request) : Proveedor {
        $newItem = new Proveedor($request->all());
        $newItem->save();
        return $newItem;
    }

    public function index(): Collection {
       return Proveedor::all();
    }

    function update(Request $request, Proveedor $proveedor) : bool {
        $toUpdate = $proveedor->update($request->all());
        return $toUpdate;
    }
}
