<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/scss/main.scss', 'resources/js/app.js'])
    <!-- favicon  -->
    <!-- estilos -->
</head>

<body>
    <button class="back-button" onclick="window.history.back()">Volver Atrás</button>
</body>

</html>
