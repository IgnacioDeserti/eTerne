@extends('layouts.plantilla')
@section('title', 'Add')

@section('content')
    
    <h1>BIENVENIDO A AGREGAR CATEGORIAS</h1>

    <form action="{{route('categories.store')}}" method="post">

        @csrf

        <label>
            nombre
            <input type="text" name="name" required>
        </label>
        <br>

        <button type="submit">Agregar</button>
    </form>

@endsection
