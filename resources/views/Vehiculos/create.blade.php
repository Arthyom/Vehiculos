@extends('Layouts.base')

@section('content')


<div class="container">
    <form method="post" action="/Vehiculos" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Marca</label>
            <div class="col-8"            >
                <input type="text" class="form-control" name="Marca"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Modelo</label>
            <div class="col-8"            >
                <input type="text" class="form-control" name="Modelo"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Año</label>
            <div class="col-8"            >
                <input type="number" class="form-control" name="Anio"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Placa</label>
            <div class="col-8"            >
                <input type="text" class="form-control" name="Placa"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Alias</label>
            <div class="col-8"            >
                <input type="text" class="form-control" name="Alias"/>
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