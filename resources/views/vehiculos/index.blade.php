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

<h1>Listado de Vehiculos</h1>

<a  class="btn btn-success" href="{{ route('vehiculos.create') }}">Crear</a>


<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Alias</th>
                <th scope="col">Placa</th>
                <th scope="col">Nombre</th>
                <th scope="col">Klometraje</th>
                <th scope="col">Opciones</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($allVehicles as $vehicle)
                
            <tr class="">
                <td>
                    @if ( count( $vehicle->imagenes  ) > 0)                        
                    <img src="{{ asset('files/'.$vehicle->imagenes->firstOrFail()->Name) }}" style="max-width: 100px; min-width: 100px;;">
                    @else
                    <span
                        class="badge bg-danger"
                        >No image item</span
                    >
                    
                    @endif

            
                </td>
                <td>{{ $vehicle->Alias }}</td>
                <td>{{ $vehicle->Placa }}</td>
                <td>{{ $vehicle->Marca }} {{$vehicle->Modelo}} {{$vehicle->Anio}}</td>
                <td>{{ $vehicle->Kilometraje }}</td>
                <td>

                    <div class="row" >
                        <div class="col-4">
                            <a  class="btn btn-primary btn-expand-block" href="{{ route('vehiculos.show', $vehicle->id) }}">Ver</a>
                        </div>

                        <div class="col-4">
                            <a  class="btn btn-warning" href="{{ route('vehiculos.edit', $vehicle->id) }}">Editar</a>
                        </div>

                        <div class="col-4">
                            <a  class="btn btn-danger" href="">Borrar</a>
                        </div>
                    </div>
                    
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>




@endsection