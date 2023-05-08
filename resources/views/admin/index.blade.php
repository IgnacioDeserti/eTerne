@extends('layouts.plantilla')

@section('title', 'Index')

@section('content')

    <h1>Buen dia ADMIN</h1><br><br>
    <h2>Que tenes que hacer hoy?</h2><br><br>

    <form action="{{route('admin.action')}}" method="POST">
        @csrf
        <button type="submit" name="action" value="products">Agregar productos</button><br><br>
        <button type="submit" name="action" value="categories">Agregar categorias</button><br><br>
        <button type="submit" name="action" value="users">Ver usuarios</button><br><br>

    </form>

@endsection
