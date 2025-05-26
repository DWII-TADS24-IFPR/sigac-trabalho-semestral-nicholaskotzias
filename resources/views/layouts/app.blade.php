<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>@yield('title', 'SIGAC')</title>
</head>
<body>
    @include('layouts.navbar')

    <div class="container">
        <h1>SIGAC -  Sistema de Gerenciamneto de Atividades Complementares</h1>
        @yield('content')

    </div>
    @include('layouts.footer')
</body>
</html>
