@extends('Layouts.base')


@section('content')

<a  class="btn btn-success" href="{{ route('vehiculos.create') }}">Crear</a>


<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Alias</th>
                <th scope="col">Placa</th>
                <th scope="col">Nombre</th>
                <th scope="col">Año</th>
                <th scope="col">Klometraje</th>
                <th scope="col">Opciones</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($allVehicles as $vehicle)
                
            <tr class="">
                <td>
                        <img src="{{ asset('files/'.$vehicle->imagenes->firstOrFail()->Name) }}" style="max-width: 100px; min-width: 100px;;">
            
                </td>
                <td>{{ $vehicle->Alias }}</td>
                <td>{{ $vehicle->Placa }}</td>
                <td>{{ $vehicle->Marca }} {{$vehicle->Modelo}}</td>
                <td>{{ $vehicle->Anio }}</td>
                <td>{{ $vehicle->Kilometraje }}</td>
                <td>

                    <div class="row" >
                        <div class="col-4">
                            <a  class="btn btn-primary" href="{{ route('vehiculos.show', $vehicle->id) }}">Ver</a>
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