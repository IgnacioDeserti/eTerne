@extends('layouts.plantilla')
@props(['producto', 'photos', 'videos'])
@section('title', $producto->name)
@section('content')
    <div class="product-details">
        <div id="imageGallery"></div>
        <div class="product-details__info">
            <h1 class="product-details__title">{{ $producto->name }}</h1>
            <div class="product-details__description">{{ $producto->description }}</div>
            <p>$<strong> {{ $producto->price }}</strong></p>
            <button class="product-details__buy-button"><a href="{{ route('productos.index') }}">Volver al menu de
                    productos</a></button>
            <button class="product-details__buy-button"><a href="{{ route('productos.edit', $producto) }}">Editar
                    Producto</a></button>
            <form action="{{ route('productos.destroy', $producto) }}" method="post"> @csrf @method('delete')
                <button class="product-details__buy-button" type="submit">Eliminar</button>
            </form>
        </div>
    </div>
    <script>
        window.productId = {{ $producto->id }};
    </script>
@endsection
