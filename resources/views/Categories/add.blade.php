@extends('layouts.plantilla')

@section('title', 'Add')

@section('content')
    <h1>BIENVENIDO A AGREGAR CATEGORIAS</h1>
    <div class="containerFormAdd">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <label>
                Nombre
                <input type="text" name="name" required>
            </label>
            <button type="submit">Agregar</button>
        </form>
    </div>
@endsection