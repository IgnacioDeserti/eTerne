@extends('layouts.plantilla')
@props(['photos', 'videos'])

@section('title', $category->name)

@section('content')
    
    <h1>BIENVENIDO A LA CATEGORIA <br><br> {{$category->name}}</h1>

    <a href="{{route('categories.index')}}">Volver al menu de categorias</a>

    <a href="{{route('categories.edit', $category)}}">Editar categoria</a>

    <form action="{{route('categories.destroy', $category)}}" method="post">
        @csrf
        @method('delete')

        <button type="submit">Eliminar</button>
    </form>
    
    <p><strong>{{$category->price}}</strong></p>
    <p>{{$category->description}}</p>

@endsection