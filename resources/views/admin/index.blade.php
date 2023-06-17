@extends('layouts.plantilla')

@section('title', 'Index')

@section('content')
    <div class="containerGeneral">
        <div class="containerAdmin">
        <h1>Buen dia ADMIN</h1>
        <h2>Que tenes que hacer hoy?</h2>

        <form action="{{ route('admin.action') }}" method="POST">
            @csrf
            <button type="submit" name="action" value="products">Agregar productos</button>
            <button type="submit" name="action" value="categories">Agregar categorias</button>
            <button type="submit" name="action" value="users">Ver usuarios</button>
            <button type="submit" name="action" value="spreadsheet">Hoja de Calculo</button>
        </form>
    </div>
    </div>
@endsection
