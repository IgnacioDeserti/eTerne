@extends('layouts.muestraProductos')

@section('title', $producto->name)

@section('content')
    <div class="product-details">
        <div class="imagenes">
            @foreach ($photos as $photo)
                <img src="{{ asset($photo['url']) }}" class="imagen" height="150px" width="150px">
            @endforeach

            @foreach ($videos as $video)
                <iframe src="{{ asset($video['url']) }}" class="video" frameborder="0" height="150px" width="150px"></iframe>
            @endforeach
        </div>

        <div class="product-details__info informacion">
            <h1 class="product-details__title titulo">{{ $producto->name }}</h1>
            <p class="product-details__description">{{ $producto->description }}</p>
            <p class="precio"><strong>$</strong> {{ $producto->price }}</p>
            <form action="{{ route('cart.store') }}" method="POST" class="formulario">
                @csrf
                <input type="hidden" name="id" value="{{ $producto->id }}">
                <input type="hidden" name="name" value="{{ $producto->name }}">
                <input type="hidden" name="price" value="{{ $producto->price }}">

                <label for="" class="etiqueta-cantidad">Ingrese cantidad</label>
                <input type="number" min="1" max="{{ $producto->stock }}" name="quantity" class="cantidad" required>
                <button class="product-details__buy-button" type="submit">Agregar al carrito</button>
            </form>
        </div>
    </div>
@endsection
