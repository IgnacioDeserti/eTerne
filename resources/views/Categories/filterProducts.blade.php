@extends('layouts.plantilla')
@props(['products', 'category'])
@livewireScripts

@section('title', 'Filter Products')

@section('content')
    
    <h1>PRODUCTOS DE LA CATEGORIA {{$category->name}}</h1>
    
    @livewire('filter-products', ['idCategory' => $category->id])

@endsection
