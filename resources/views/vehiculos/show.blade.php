@extends('Layouts.base')

@section('content')
    @include('vehiculos.data', ['vehicle'=>$vehiculo])
@endsection