@extends('layouts.plantilla') @props(['photos', 'videos']) @section('title', $producto->name) @section('content') <div
    class="product-details">
    @foreach ($photos as $photo)
        {{-- <img class="product-details__image" src="{{ asset($photo->url) }}" height="150px" width="150px"> --}} {{-- <div id="galleryProduct"></div> --}}
        @endforeach @foreach ($videos as $video)
            <iframe src="{{ asset($video->url) }}" frameborder="0" height="150px" width="150px"></iframe>
        @endforeach <br>
        <div class="product-details__info">
            <h1 class="product-details__title">{{ $producto->name }}</h1>
            <div class="product-details__description">Descripcion: {{ $producto->description }}</div>
            <p>$<strong> {{ $producto->price }}</strong></p> <button class="product-details__buy-button"><a
                    href="">Añadir al carrito</a></button> <button class="product-details__buy-button"><a
                    href="{{ route('productos.index') }}">Volver al menu de productos</a></button> <button
                class="product-details__buy-button"><a href="{{ route('productos.edit', $producto) }}">Editar
                    Producto</a></button>
            <form action="{{ route('productos.destroy', $producto) }}" method="post"> @csrf @method('delete') <button
                    class="product-details__buy-button" type="submit">Eliminar</button> </form>
        </div>
</div> @endsection
