@extends('layouts.plantilla')

@section('title', 'Edit')

@section('content')
    
    <h1>BIENVENIDO A EDITAR EL PRODUCTO</h1>

    <form action="{{route('categories.update', $category)}}" method="post">

        @csrf

        @method('put')

        <label>
            nombre
            <input type="text" name="name" value="{{$category->name}}" required>
        </label>

        <button type="submit">Editar</button>
    </form>

@endsection
