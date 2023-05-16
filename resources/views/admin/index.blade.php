@extends('layouts.plantilla')

@section('title', 'Index')

@section('content')

    <h1>Buen dia ADMIN</h1>
    <h2>Que tenes que hacer hoy?</h2>

    <form action="{{route('admin.action')}}" method="POST">
        @csrf
        <button type="submit" name="action" value="products">Agregar productos</button>
        <button type="submit" name="action" value="categories">Agregar categorias</button>
        <button type="submit" name="action" value="users">Ver usuarios</button>
    </form>

@endsection
