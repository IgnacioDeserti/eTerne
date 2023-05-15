@extends('layouts.plantilla')
@livewireScripts
@section('title', 'Index')

@section('content')
    
    <h1>BIENVENIDO A LAS CATEGORIAS</h1>
    <a href="{{route('categories.create')}}">Agregar Categoria</a>
    
    @livewire('search-categories')

    {{$categories->links()}}

@endsection
