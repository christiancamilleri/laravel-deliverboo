<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
    
        DeliveBoo
        {{-- {{ config('app.name', 'Laravel') }} --}}
    </title>

    <link rel="icon" type="image/x-icon" href="{{ asset('img/logoR3.png') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        @include('partials/nav')

        <main class="">
            @yield('content')
        </main>

        @include('partials/footer')
    </div>

    @stack('scripts')
</body>

</html>

