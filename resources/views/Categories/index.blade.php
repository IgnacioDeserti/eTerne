@extends('layouts.plantilla')
@livewireScripts
@section('title', 'Index')

@section('content')
    <h1>BIENVENIDO A LAS CATEGORIAS</h1>
    <div class="containerListaProductos">
        <a class="addProduct" href="{{ route('categories.create') }}">Agregar Categoria</a>
        @livewire('search-categories')
        {{ $categories->links() }}
    </div>
@endsection
