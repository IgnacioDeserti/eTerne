@extends('layouts.plantilla')

@section('title', 'Edit')

@section('content')
    <h1>BIENVENIDO A EDITAR EL PRODUCTO</h1>
    <div class="containerFormAdd">
        <form action="{{ route('productos.update', $producto) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <label>
                Nombre
                <input type="text" name="name" value="{{ $producto->name }}" required value="{{ old('name') }}">
            </label>
            @error('name')
                <small>{{ $message }}</small>
            @enderror
            <label>
                Descripcion
                <input type="textarea" name="description" value="{{ $producto->description }}" required>
            </label>
            @error('description')
                <small>{{ $message }}</small>
            @enderror
            <label>
                Categoria
                <select name="idCategory">
                    <option value="{{ old('idCategory') }}">Seleccione categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </label>
            @error('idCategory')
                <small>{{ $message }}</small>
            @enderror
            <label>
                Marca
                <input type="text" name="brand" value="{{ $producto->brand }}" required>
            </label>
            @error('stock')
                <small>{{ $message }}</small>
            @enderror
            <label>
                Precio
                <input type="number" step="any" name="price" required value="{{ $producto->stock }}">
            </label>
            @error('price')
                <small>{{ $message }}</small>
            @enderror
            <label>
                Foto
                <input type="file" name="image[]" value="{{ old('image[]') }}" multiple>
            </label>
            <label>
                Video
                <input type="file" name="video[]" value="{{ old('video[]') }}" multiple>
            </label>
            <button type="submit">Editar</button>
        </form>
    </div>
@endsection
