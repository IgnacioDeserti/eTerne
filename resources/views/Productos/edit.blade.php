@extends('layouts.plantilla')

@section('title', 'Edit')

@section('content')
    
    <h1>BIENVENIDO A EDITAR EL PRODUCTO</h1>

    <form action="{{route('productos.update', $producto)}}" method="post">

        @csrf

        @method('put')

        <label>
            nombre
            <input type="text" name="name" value="{{$producto->name}}" required value="{{old('name')}}">
        </label>

        @error('name')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror

        <br><br>

        <label>
            descripcion
            <input type="textarea" name="description" value="{{$producto->description}}" required value="{{old('description')}}">
        </label>

        @error('description')
        <br>
            <small>{{$message}}</small>
        <br>
        @enderror

        <br><br>

        <label>
            idcategoria
            <input type="number" name="idCategory" value="{{$producto->idCategory}}" required value="{{old('idCategory')}}">
        </label>

        @error('idCategory')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror

        <br><br>

        <label>
            stock
            <input type="number" name="stock" value="{{$producto->stock}}" required value="{{old('stock')}}">
        </label>

        @error('stock')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror

        <br><br>

        <label>
            precio
            <input type="number" step="any" name="price" value="" required value="{{old('price')}}">
        </label>

        @error('price')
            <br>
                <small>{{$message}}</small>
            <br>
        @enderror
        
        <br><br>

        <label>
            foto
            <input type="file" name="photo1" value="{{$producto->photo1}}" >
        </label>
        <br><br>
        <label>
            video
            <input type="file" name="video" value="{{$producto->video}}">
        </label>

        <br><br>

        <button type="submit">Editar</button>
    </form>

@endsection
