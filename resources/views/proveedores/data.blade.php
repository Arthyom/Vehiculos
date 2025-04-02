@php
    $action = explode( '@',Route::currentRouteAction())[1];
    $controller = explode( '.',Route::currentRouteName())[0];
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

{{-- @extends('Layouts.base')

@section('content') --}}


<div class="container">
    <form method="post" action="/{{$action}}" enctype="multipart/form-data" >
        @csrf

        @if ('PATCH' == $method)
            @method('PATCH')
        @endif
        
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Nombre</label>
            <div class="col-8"            >
                <input type="text" value="{{ $item->Nombre }}" class="form-control" name="Nombre"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Alias</label>
            <div class="col-8"            >
                <input type="text" value="{{ $item->Alias }}" class="form-control" name="Alias"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Direccion</label>
            <div class="col-8"            >
                <input type="text" value="{{ $item->Direccion }}" class="form-control" name="Direccion"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Descripcion</label>
            <div class="col-8"            >
                <textarea   class="form-control" name="Descripcion">
                    {{$item->Descripcion}}
                </textarea>
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





{{-- @endsection --}}