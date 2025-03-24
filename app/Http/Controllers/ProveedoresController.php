<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Providers\ProveedorProvider;
use Illuminate\Http\Request;


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
        return view('proveedores.index', compact('allProviders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create', ['proveedor'=> new Proveedor()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->proveedorProvider->create($request);
        return redirect( route('proveedores.index') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact(var_name: 'proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        //
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
       $this->proveedorProvider->update($request, $proveedor);
       return redirect(route('proveedores.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
