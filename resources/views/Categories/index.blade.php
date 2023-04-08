@extends('layouts.plantilla')

@section('title', 'Index')

@section('content')
    
    <h1>BIENVENIDO A LAS CATEGORIAS</h1>
    <a href="{{route('categories.create')}}">Agregar Categoria</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="{{route('categories.show', $category)}}">{{$category->name}}</a>
            </li>
        @endforeach
    </ul>

    {{$categories->links()}}

@endsection
