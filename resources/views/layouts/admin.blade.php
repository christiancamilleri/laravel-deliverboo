<?php
$user = Auth::user();

$userRestaurant = Auth::user()->restaurant;

function giveActive($route)
{
    if ($route == URL::full()) {
        return 'list-group-item-danger';
    }
}
?>


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


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="app">


        @include('partials/nav')

        <main>
            <div class="container-fluid mt-5">

                <div class="row">

                    <div class="col-12 col-lg-2 aside">
                        @include('partials/aside')
                    </div>

                    <div class="col-12 col-lg-10">
                        @yield('content')
                    </div>

                </div>

            </div>
        </main>

        <div class="mt-5">
            @include('partials/footer')

        </div>

    </div>

    @stack('scripts')
</body>

</html>
