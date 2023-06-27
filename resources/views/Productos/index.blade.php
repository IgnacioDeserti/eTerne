@extends('layouts.plantilla')
@props(['productos'])
@livewireScripts

@section('title', 'Index')

@section('content')
    <h1>BIENVENIDO A LOS PRODUCTOS</h1>
    <div class="containerListaProductos">
        <a class="addProduct" href="{{ route('productos.create') }}">Agregar Producto</a>
        @livewire('search-products')
    </div>
@endsection
