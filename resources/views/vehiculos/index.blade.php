@extends('Layouts.base')


@section('content')



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
                    @foreach ($vehicle->imagenes as $image )
                        <img src="{{ asset('files/'.$image->Name) }}" style="max-width: 100px; min-width: 100px;;">
                    @endforeach
            
                </td>
                <td>{{ $vehicle->Alias }}</td>
                <td>{{ $vehicle->Placa }}</td>
                <td>{{ $vehicle->Marca }} {{$vehicle->Modelo}}</td>
                <td>{{ $vehicle->Anio }}</td>
                <td>{{ $vehicle->Kilometraje }}</td>
                <td>opciones</td>

            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>




@endsection