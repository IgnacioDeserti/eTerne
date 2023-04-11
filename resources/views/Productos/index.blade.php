@extends('layouts.plantilla')
@props(['productos'])

@section('title', 'Index')

@section('content')
    
    <h1>BIENVENIDO A LOS PRODUCTOS</h1>
    <a href="{{route('productos.create')}}">Agregar Producto</a><br><br>
    <ul>
        @foreach ($productos as $item)
            <h3><a href="{{route('productos.show', $item)}}">{{$item->name}}</a></h3><br>
        @endforeach
    </ul>

    

@endsection
