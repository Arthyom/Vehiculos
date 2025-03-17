@extends('Layouts.base')


@section('content')



<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                {{-- <th scope="col">Imagen</th> --}}
                <th scope="col">Vehiculo</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Kilometraje</th>
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
                <td>{{ $service->Kilometraje }}</td>
                <td>opciones</td>

            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>




@endsection