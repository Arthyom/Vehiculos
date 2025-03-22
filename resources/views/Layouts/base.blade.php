<!doctype html>
<html lang="en">
    <head>
        @include('Layouts.header')
    </head>

    <body>

        <main>
            @if (Auth::check())                
                @include('Layouts.maenu')
            @endif
            @yield('content')
        </main>


        <footer>
        </footer>
        
        @include('Layouts.scripts')
    </body>
</html>
