@extends('Layouts.base')


@section('content')

<h1>Listado de Proveedores</h1>

@can('create', App\Models\User::class)
<a class="btn btn-success" href="{{ Route('proveedores.create') }}" role="button">Create</a>
@endcan

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                {{-- <th scope="col">Imagen</th> --}}
                <th scope="col">Nombre</th>
                <th scope="col">Alias</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Opciones</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($allProviders as $provider)
                
            <tr class="">
                {{-- <td> --}}
                    {{-- @foreach ($vehicle->imagenes as $image )
                        <img src="{{ asset('files/'.$image->Name) }}" style="max-width: 100px; min-width: 100px;;">
                    @endforeach
             --}}
                {{-- </td> --}}
                <td>{{ $provider->Nombre }}</td>
                <td>{{ $provider->Alias }}</td>
                <td>{{ $provider->Descripcion }}</td>
                <td>
                    

                        <div class="row" >
                            <div class="col-4">
                                <a  class="btn btn-primary" href="{{ route('proveedores.show', $provider->id) }}">Ver</a>
                            </div>
    
                            @can('update', App\Models\User::class)    
                            <div class="col-4">
                                <a  class="btn btn-warning" href="{{ route('proveedores.edit', $provider->id) }}">Editar</a>
                            </div>
                            @endcan
    
                            @can('delete', App\Models\User::class)    
                            <div class="col-4">
                                <a  class="btn btn-danger" href="">Borrar</a>
                            </div>
                            @endcan
                        </div>
                        
                    </td>



            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>




@endsection