<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/ESEAN1Bco.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/scss/main.scss', 'resources/js/app.js'])
    <!-- favicon  -->
    <!-- estilos -->
</head>
<body>
    <!-- header -->

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')
    <!-- scripts -->
</body>
</html>