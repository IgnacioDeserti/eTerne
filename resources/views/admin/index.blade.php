@extends('layouts.plantilla')

@section('title', 'Index')

@section('content')
    
    <h1>Buen dia ADMIN</h1><br><br>
    <h2>Que tenes que hacer hoy?</h2><br><br>

    <a href="{{route('admin.indexProducts')}}">Agregar Producto</a><br><br>
    
    <a href="">Agregar Categoria</a><br><br>

    {{-- <a href="{{route()}}">Ver usuarios</a><br><br> --}}


    

@endsection
