@extends('Layouts.base')

@section('content')


<div class="container">
    <form method="post" action="/proveedores" enctype="multipart/form-data" >
        @csrf
        
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Nombre</label>
            <div class="col-8"            >
                <input type="text" class="form-control" name="Nombre"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Alias</label>
            <div class="col-8"            >
                <input type="text" class="form-control" name="Alias"/>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Descripcion</label>
            <div class="col-8"            >
                <textarea  class="form-control" name="Descripcion">
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