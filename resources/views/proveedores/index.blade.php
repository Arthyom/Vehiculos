@extends('Layouts.base')


@section('content')



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
                <td>opciones</td>

            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>




@endsection