<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/scss/main.scss', 'resources/js/app.js'])
</head>

<body onload="showContent()">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <div id="loader-wrapper"></div>
    <div id="content-wrapper" class="hidden">
        <div id="menu-container">
            <header class="Cabecera">
                <nav class="Cabecera-nav">
                    <ul class="Cabecera-ul">
                        @if (Route::has('login'))
                            @auth
                                @if (auth()->user()->hasRole('admin'))
                                    <a href="{{ url('/dashboard') }}" class="Cabecera-li">Dashboard</a>
                                @endif
                                <a href="{{ route('profile.show') }}" :active="request() - > routeIs('profile.show')"
                                    class="Cabecera-li">
                                    {{ __('Profile') }}
                                </a>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="Cabecera-li">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="Cabecera-li">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="Cabecera-li">Register</a>
                                @endif
                            @endauth
                        @endif
                        <a href="{{ route('cart.index') }}" class="Cabecera-li">Carrito</a>
                    </ul>
                </nav>
                <button class="Cabecera-button">
                    <i class="fa fa-bars"></i>
                </button>
            </header>
        </div>
        <div id="carousel"></div>
        <div id="imageGallery"></div>
        <div id="footer"></div>
    </div>
</body>

</html>
