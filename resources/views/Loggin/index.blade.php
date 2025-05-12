 {{-- @extends('Layouts.base')--}}
 
<x-layout>



@session('error')
    <div class="alert alert-danger" role="alert" >
        <strong>Error en sus credenciales</strong>
    </div>
@endsession

<div class="container">
    <form method="post" action="login">
        @csrf

        {{-- <div class="mb-3 row">
            <label for="" class="col-4 col-form-label">Rol</label>
            <div class="col-8">
                <select class="form-select form-select-sm" name="Role">
                    <option selected>Seleccione</option>
                    <option value="admin">Admin</option>
                    <option value="user">Usuario</option>
                    <option value="miron">Miron</option>
                </select>
            </div>
        </div> --}}


        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Name</label>
            <div class="col-8">
                <input type="email" class="form-control" name="email"  />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Password</label>
            <div class="col-8">
                <input type="password" class="form-control" name="password" />
            </div>
        </div>

        {{-- <div class="form-check">
            <label class="form-check-label" for=""> Entrar como invitado </label>
            <input class="form-check-input" type="checkbox" value="IsGuest" />
        </div> --}}



        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" class="btn btn-primary">
                    Entrar
                </button>
            </div>
        </div>
    </form>
</div>


{{-- @endsection --}}


    
</x-layout>
