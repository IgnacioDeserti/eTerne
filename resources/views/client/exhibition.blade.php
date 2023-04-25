@extends('layouts.plantilla')
@props(['producto', 'photos', 'videos'])

@section('title', $producto->name)

@section('content')
    <h1>BIENVENIDO AL PRODUCTO <br><br> {{$producto->name}}</h1>
    
    @for ($i = 0; $i < count($photos); $i++)
        <img src="{{asset($photos[$i]['url'])}}" height="150px" width="150px">
    @endfor

    
    @for ($i = 0; $i < count($videos); $i++)
        <iframe src="{{asset($videos[$i]['url'])}}" frameborder="0" height= "150px" width= "150px"></iframe>
    @endfor <br>
    <p><strong>Precio: {{$producto->price}}</strong></p><br><br>
    
    <p>Descripcion: {{$producto->description}}</p><br><br>

    <a href="">Añadir al carrito</a><br><br>
    
    <a href="{{route('productos.index')}}">Volver al menu de productos</a> <br><br>

    <a href="{{route('productos.edit', $producto)}}">Editar Producto</a><br><br>

    <form action="{{route('productos.destroy', $producto)}}" method="post">
        @csrf
        @method('delete')

        <button type="submit">Eliminar</button>
    </form>
    

@endsection