@php
    $activeVehicle = str_contains(  Route::currentRouteName(), 'vehiculos');
    $activeProvider = str_contains(  Route::currentRouteName(), 'proveedores');
    $activeService = str_contains(  Route::currentRouteName(), 'servicios');    
@endphp

<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Vehiculos</a>
    <button
        class="navbar-toggler d-lg-none"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#collapsibleNavId"
        aria-controls="collapsibleNavId"
        aria-expanded="false"
        aria-label="Toggle navigation"
    ></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a @class(['nav-link '=> !$activeVehicle, 'nav-link active' => $activeVehicle]) href="{{ route('vehiculos.index') }}" >Vehiculos</a>
            </li>
            <li class="nav-item">
                <a @class(['nav-link '=> !$activeProvider, 'nav-link active' => $activeProvider]) href="{{ route('proveedores.index') }}">Proveedores</a>
            </li>
            <li class="nav-item">
                <a @class(['nav-link '=> !$activeService, 'nav-link active' => $activeService]) href="{{ route('servicios.index') }}">Servicios</a>
            </li>
        </ul>

        <ul class="navbar-nav d-flex my-2 my-lg-0">
            <li class="nav-item dropdown">
                <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="dropdownId"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >
                    @if ( Auth::user()->rol )
                            {{ Auth::user()->rol->nombre }}
                    @endif
                    <strong>

                        {{ Auth::user()->name }}
                        {{ Auth::user()->email }}
                    </strong>
                    
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Action 1</a>
                    <a class="dropdown-item text-bg-danger" href="/login/logout">Logout</a>
                </div>
            </li>
        </ul>
        
    </div>
</nav>




