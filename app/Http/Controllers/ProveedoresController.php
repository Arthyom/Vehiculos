<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\ProveedorProvider;


class ProveedoresController extends Controller
{
    public function __construct(protected ProveedorProvider $proveedorProvider) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        session()->put(['session'=> 1, 'moresessions' =>2 ]);
        $allProviders = $this->proveedorProvider->index();
        // return view('proveedores.index', compact('allProviders'));
        return inertia('Proveedor/ListIndex', [
            'allProviders' => $allProviders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view(view: 'proveedores.create', ['proveedor'=> new Proveedor()]);
        return inertia( 'Proveedor/CreateEdit', [
            'proveedor' => new Proveedor(),
            'asCreate' => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->proveedorProvider->create($request);
        // return redirect( route('proveedores.index') );
        return to_route('proveedores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        // return view('proveedores.show', compact(var_name: 'proveedor'));
        return inertia( 'Proveedor/CreateEdit', [
            'proveedor' => $proveedor,
            'asShow' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        //
        // return view('proveedores.edit', compact('proveedor'));
        return inertia( 'Proveedor/CreateEdit', [
            'proveedor' => $proveedor,
            'asCreate' => false
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        try {
            $this->proveedorProvider->update($request, $proveedor);
            return to_route('proveedores.index');
            //code...
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect(route('proveedores.index'))->withError($th);
        }
            // return redirect(route('proveedores.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
