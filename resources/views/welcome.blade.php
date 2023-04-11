@props(['jsonProducts', 'jsonImages'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/scss/main.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="menu-container" class="menu-container">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="aNav">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="aNav">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="aNav">Register</a>
                @endif
            @endauth
        @endif
    </div>

    <div id="carousel" data-list="{{$jsonProducts}}, {{$jsonImages}}"></div>
    <!-- <div id="products-section"></div> -->
</body>

</html>
