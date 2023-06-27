@props(['categories'])
@extends('layouts.muestraProductos', compact('categories'))

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@section('title', 'eTerne')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/scss/main.scss', 'resources/js/app.js'])
    <script src="https://live.decidir.com/static/v1/decidir.js"></script>
</head>

<body onload="showContent()">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <div id="loader-wrapper"></div>
    <div id="content-wrapper" class="hidden">
        <div id="paymentForm"></div>
        <div id="products-section"></div>
        <div id="carousel"></div>
        <div id="carousel3D"></div>
        <div id="footer"></div>
    </div>
</body>
@endsection
</html>
