@extends('Layouts.base')


@section('content')


<a class="btn btn-success" href="{{ route('servicios.create') }}">Crear</a>

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                {{-- <th scope="col">Imagen</th> --}}
                <th scope="col">Vehiculo</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Fecha</th>
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
                <td>{{ $service->Created_At->format('d-m-Y') }}</td>
                <td>{{ $service->Kilometraje }}</td>
                <td>
                    
                    <div class="row" >
                        <div class="col-4">
                            <a  class="btn btn-primary" href="{{ route('servicios.show', $service->id) }}">Ver</a>
                        </div>

                        <div class="col-4">
                            <a  class="btn btn-warning" href="{{ route('servicios.edit', $service->id) }}">Editar</a>
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