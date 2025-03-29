@extends('Layouts.base')


@section('content')

@session('error')
    <div
        class="alert alert-danger alert-dismissible fade show"
        role="alert"
    >
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>
        <strong>Error</strong> Error al crear o editar el registro
    </div>
    
    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function (alert) {
            new bootstrap.Alert(alert);
        });
    </script>
    
@endsession

<h1>Listado de Servicios Automotrices</h1>

@can('create', App\Models\User::class)    
<a class="btn btn-success" href="{{ route('servicios.create') }}">Crear</a>
@endcan

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                {{-- <th scope="col">Imagen</th> --}}
                <th scope="col">Vehiculo</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Fecha</th>
                <th scope="col">Kilometraje</th>
                <th scope="col">Total</th>
                <th scope="col">Opciones</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($allServices as $service)
                
            <tr class="">
                {{-- <td> --}}
                    {{-- @foreach ($vehicle->imagenes as $image )
                        <img src="{{ asset('files/'.$image->Name) }}" style="max-width: 100px; min-width: 100px;;">
                    @endforeach
             --}}
                {{-- </td> --}}
                <td>
                    ({{ $service->vehiculo->Alias }}) {{$service->vehiculo->Marca}} {{$service->vehiculo->Modelo}}
                    {{ $service->vehiculo->Anio }}
                </td>
                <td>{{ $service->proveedor->Alias }}</td>
                <td>{{ $service->Created_At->format('d-M-Y') }}</td>
                <td>{{ $service->Kilometraje }}</td>
                <td>${{ number_format( $service->Total,2 )}}</td>
                <td>
                    
                    <div class="row" >
                        <div class="col-4">
                            <a  class="btn btn-primary" href="{{ route('servicios.show', $service->id) }}">Ver</a>
                        </div>

                        @can('update', App\Models\User::class)    
                        <div class="col-4">
                            <a  class="btn btn-warning" href="{{ route('servicios.edit', $service->id) }}">Editar</a>
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