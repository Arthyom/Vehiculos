@extends('Layouts.base')

@section('content')

    @include('servicios.data', ['item'=>$servicio]);

@endsection