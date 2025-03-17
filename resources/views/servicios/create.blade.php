@extends('Layouts.base')

@section('content')


<div class="container">
    <form method="post" action="/servicios" enctype="multipart/form-data" >
        @csrf
        

        

        <div class="mb-3">
            <label for="" class="form-label">Vehiculo</label>
            <select
                class="form-select form-select-lg"
                name="Vehiculo_Id"
            >
            <option selected>Select one</option>
            
            @foreach ($allVehicles as $vehicle)
                <option value="{{ $vehicle->id }}">
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
            <option selected>Select one</option>
            
            @foreach ($allProviders as $provider)
                <option value="{{ $provider->id }}">({{$provider->Alias}}) {{ $provider->Nombre }}</option>
            @endforeach

            </select>
        </div>
        

       
       
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Descripcion</label>
            <div class="col-8"            >
                <input type="text" class="form-control" name="Descripcion"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Kilometraje</label>
            <div class="col-8"            >
                <input type="number" class="form-control" name="Kilometraje"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Imagen</label>
            <div class="col-8"            >
                <input type="file" class="form-control" name="Imagen[]" multiple/>
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" class="btn btn-primary">
                    Action
                </button>

                <button type="submit" class="btn btn-danger">
                    Cancelar
                </button>
            </div>
        </div>
    </form>
</div>





@endsection