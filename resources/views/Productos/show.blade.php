@extends('layouts.plantilla')
@props(['photos', 'videos'])

@section('title', $producto->name)

@section('content')
    
    <h1>BIENVENIDO AL PRODUCTO <br><br> {{$producto->name}}</h1>

    
    @foreach ($photos as $photo)
        <img src="{{asset($photo->url)}}">
    @endforeach

    @foreach ($videos as $video)
        <iframe src="{{($video->url)}}" frameborder="0"></iframe>
    @endforeach
    <a href="{{route('productos.index')}}">Volver al menu de productos</a>

    <a href="{{route('productos.edit', $producto)}}">Editar Producto</a>

    <form action="{{route('productos.destroy', $producto)}}" method="post">
        @csrf
        @method('delete')

        <button type="submit">Eliminar</button>
    </form>
    
    <p><strong>{{$producto->price}}</strong></p>
    <p>{{$producto->description}}</p>

@endsection