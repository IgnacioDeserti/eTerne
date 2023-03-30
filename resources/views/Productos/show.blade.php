@extends('layouts.plantilla')

@section('title', $producto->name)

@section('content')
    
    <h1>BIENVENIDO AL PRODUCTO <br><br> {{$producto->name}}</h1>
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