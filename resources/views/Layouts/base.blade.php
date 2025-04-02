<x-layout.layout>
    <main>
        @if (Auth::check())                
            @include('Layouts.maenu')
        @endif
        @yield('content')
    </main>


    <footer>
    </footer>
</x-layout.layout>