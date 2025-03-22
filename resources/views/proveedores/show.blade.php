@extends('Layouts.base')

@section('content')

    @include('proveedores.data', ['item'=>$proveedor]);

@endsection