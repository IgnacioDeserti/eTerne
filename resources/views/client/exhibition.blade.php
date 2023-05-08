@extends('layouts.plantilla')
@props(['producto', 'photos', 'videos'])

@section('title', $producto->name)

@section('content')
    <h1>BIENVENIDO AL PRODUCTO<br><br> {{$producto->name}}</h1>
    
    @for ($i = 0; $i < count($photos); $i++)
        <img src="{{asset($photos[$i]['url'])}}" height="150px" width="150px">
    @endfor

    
    @for ($i = 0; $i < count($videos); $i++)
        <iframe src="{{asset($videos[$i]['url'])}}" frameborder="0" height= "150px" width= "150px"></iframe>
    @endfor <br>
    <p><strong>Precio: {{$producto->price}}</strong></p><br><br>
    
    <p>Descripcion: {{$producto->description}}</p><br><br>

    <form action="{{route('cart.store')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$producto->id}}">
        <input type="hidden" name="name" value="{{$producto->name}}">
        <input type="hidden" name="price" value="{{$producto->price}}">
        <label for="">Ingrese cantidad</label>
        <input type="number" name="quantity"> 
        <button type="submit">Agregar al carrito</button>
    </form>

@endsection