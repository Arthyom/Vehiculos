@php
    $action = explode( '@',Route::currentRouteAction())[1];
    $controller = explode( '.', string: Route::currentRouteName())[0];
    $method = 'post';

    switch ($action) {
        case 'create':
            # code...
            $action = "$controller/create";
            break;
        
        case 'edit':
            $method = 'PATCH';
            $action = "$controller/{$vehicle->id}";
            break;

        case 'show';
            break;
        
        default:
            $action = 'show';
            # code...
            break;
    }
@endphp

<div class="container">
    <form method="POST" action="/{{$action}}" enctype="multipart/form-data" >

        @csrf
        @if ('PATCH' == $method)
            @method('PATCH')
        @endif
        
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Marca</label>
            <div class="col-8"            >
                <input type="text" value="{{ $vehicle->Marca }}" class="form-control" name="Marca"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Modelo</label>
            <div class="col-8"            >
                <input type="text" value="{{ $vehicle->Modelo }}"  class="form-control" name="Modelo"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Año</label>
            <div class="col-8"            >
                <input type="number" value="{{ $vehicle->Anio }}"  class="form-control" name="Anio"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Placa</label>
            <div class="col-8"            >
                <input type="text" value="{{ $vehicle->Placa }}"  class="form-control" name="Placa"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Alias</label>
            <div class="col-8"            >
                <input type="text"  value="{{ $vehicle->Alias }}"  class="form-control" name="Alias"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Kilometraje</label>
            <div class="col-8"            >
                <input type="number" value="{{ $vehicle->Kilometraje }}"  class="form-control" name="Kilometraje"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Tipo de Llanta</label>
            <div class="col-8"            >
                <input type="text" value="{{ $vehicle->TipoNeumatico }}"  class="form-control" name="TipoNeumatico"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Precion de Llanta</label>
            <div class="col-8"            >
                <input type="number"  value="{{ $vehicle->PrecionNeumatico }}"  class="form-control" name="PrecionNeumatico"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Imagen</label>
            <div class="col-8"            >
                <input type="file" class="form-control" name="Imagen[]" multiple/>
            </div>
        </div>

        @if ($action != 'create')
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Imagenes</label>
            <div class="col-8"            >
                @foreach ($vehicle->imagenes as $imagen )
                    <picture>
                        <img src='{{asset("files/{$imagen->Name}")}}' class="img-fluid" alt="image desc"/>
                    </picture>
                    
                @endforeach
            </div>
        </div>
        @endif
        
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


