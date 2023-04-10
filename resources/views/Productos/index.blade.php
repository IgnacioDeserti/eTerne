@extends('layouts.plantilla')
@props(['jsonProducts'])

@section('title', 'Index')

@section('content')
    
    <h1>BIENVENIDO A LOS PRODUCTOS</h1>
    <a href="{{route('productos.create')}}">Agregar Producto</a><br><br>
    <ul>
        
    </ul>

    

@endsection
