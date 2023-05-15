@extends('layouts.plantilla')
@props(['productos'])

@section('title', 'Index')

@section('content')
    <h1>BIENVENIDO A LOS PRODUCTOS</h1>
    <div class="containerListaProductos">
        <a href="{{ route('productos.create') }}">Agregar Producto</a><br><br>
        <ul>
            @foreach ($productos as $item)
                <li><a href="{{ route('productos.show', $item) }}">{{ $item->name }}</a></li><br>
            @endforeach
        </ul>
    </div>
@endsection
