@extends('layouts.plantilla')
@props(['categories'])
@section('title', 'Add')

@section('content')
    <h1>BIENVENIDO A AGREGAR LOS PRODUCTOS</h1>
    <div class="containerFormAdd">
    <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>
            Nombre
            <input type="text" name="name" required value="{{ old('name') }}">
        </label>
        <label>
            Descripcion
            <input type="textarea" name="description" required value="{{ old('desctription') }}">
        </label>
        <label>
            Stock
            <input type="number" name="stock" required value="{{ old('stock') }}">
        </label>
        <label>
            Precio
            <input type="number" step="any" name="price" required value="{{ old('price') }}">
        </label>
        <label>
            Categoria
            <select name="idCategory">
                <option value="">Seleccione categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Foto
            <input type="file" name="image[]" multiple>
        </label>
        <label>
            Video
            <input type="file" name="video[]" multiple>
        </label>
        <button type="submit">Agregar</button>
    </form>
    </div>
@endsection
