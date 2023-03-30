@extends('layouts.plantilla')
@props(['categories'])
@section('title', 'Add')

@section('content')
    
    <h1>BIENVENIDO A AGREGAR LOS PRODUCTOS</h1>

    <form action="{{route('productos.store')}}" method="post">

        @csrf

        <label>
            nombre
            <input type="text" name="name" required value="{{old('name')}}">
        </label>

        <br><br>
        <label>
            descripcion
            <input type="textarea" name="description" required value="{{old('desctription')}}">
        </label>

        <br><br>

        <label>
            stock
            <input type="number" name="stock" required value="{{old('stock')}}">
        </label>

        <br><br>

        <label>
            precio
            <input type="number" step="any" name="price" required value="{{old('price')}}">
        </label>
        
        <br><br>

        <label>
            categoria
            <select name="idCategory">
                <option value="">Seleccione categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </label>

        <br><br>

    <!--    <label>
            foto
            <input type="file" name="photo1" value="{{old('photo1')}}">
        </label>
        <br><br>
        <label>
            video
            <input type="file" name="video" value="{{old('video')}}">
        </label>

        <br><br> -->

        <button type="submit">Agregar</button>
    </form>

@endsection
