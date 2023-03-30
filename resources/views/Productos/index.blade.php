@extends('layouts.plantilla')

@section('title', 'Index')

@section('content')
    
    <h1>BIENVENIDO A LOS PRODUCTOS</h1>
    <a href="{{route('productos.create')}}">Agregar Producto</a>
    <ul>
        @foreach ($productos as $product)
            <li>
                <a href="{{route('productos.show', $product)}}">{{$product->name}}</a>
            </li>
        @endforeach
    </ul>

    {{$productos->links()}}

@endsection
