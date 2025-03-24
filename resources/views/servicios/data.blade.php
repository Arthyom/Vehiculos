@php
    $action = explode( '@',Route::currentRouteAction())[1];
    $controller = explode( '.', string: Route::currentRouteName())[0];
    $method = 'post';


    switch ($action) {
        case 'create':
            $action = "{$controller}";
            break;
        
        case 'edit':
            $method = 'PATCH';
            $action = "{$controller}/{$item->id}";
            break;

        case 'show';
            break;
        
        default:
            $action = 'show';
            break;
    }
@endphp

@extends('Layouts.base')

@section('content')


<div class="container">
    <form method="post" action="/{{$action}}" enctype="multipart/form-data" >
        @csrf
        
        @if ('PATCH' == $method)
            @method($method)
        @endif
      
        <div class="mb-3">
            <label for="" class="form-label">Vehiculo</label>
            <select
                class="form-select form-select-lg"
                name="Vehiculo_Id"
            >
            <option >Select one</option>
            @foreach ($allVehicles as $vehicle)
                <option value="{{ $vehicle->id }}" @selected($vehicle->id == $item->Vehiculo_Id) >
                    ({{$vehicle->Alias}}) {{$vehicle->Marca}} {{$vehicle->Modelo}} {{$vehicle->Anio}}
                </option>
            @endforeach

            </select>
        </div>


        <div class="mb-3">
            <label for="" class="form-label">Proveedor</label>
            <select
                class="form-select form-select-lg"
                name="Proveedor_Id"
            >
            <option >Select one</option>
            
            @foreach ($allProviders as $provider)
                <option value="{{ $provider->id }}" @selected($provider->id == $item->Proveedor_Id) >({{$provider->Alias}}) {{ $provider->Nombre }}</option>
            @endforeach

            </select>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Total</label>
            <div class="col-8"            >
                <input  class="form-control" type="number" name="Total" value="{{ $item->Total }}">
            </div>
        </div>
    
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Descripcion</label>
            <div class="col-8"            >
                @if ($method== "post")                    
                <input  class="form-control" type="date" name="created_at" >
                @else
                <input  class="form-control" type="date" name="created_at" value="{{ $item->Created_At->format('Y-m-d') }}">
                @endif

            </div>
        </div>
       
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Descripcion</label>
            <div class="col-8"            >
                <textarea class="form-control" name="Descripcion">
                    {{$item->Descripcion}}
                </textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Kilometraje</label>
            <div class="col-8"            >
                <input type="number" value="{{ $item->Kilometraje }}" class="form-control" name="Kilometraje"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Nota</label>
            <div class="col-8"            >
                <input type="file" class="form-control" name="Nota" multiple/>
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                @if ($action != 'show')     
                    <button type="submit" class="btn btn-primary">
                        Enviar
                    </button>
                @endif

                <button type="submit" class="btn btn-danger">
                    Cancelar
                </button>
            </div>
        </div>
    </form>
</div>





@endsection