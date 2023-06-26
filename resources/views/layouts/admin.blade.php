<?php
$user = Auth::user();

$userRestaurant = Auth::user()->restaurant;

function giveActive($route)
{
    if ($route == URL::full()) {
        return 'active';
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


        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.restaurants.index') }}">
                    <img src="{{ asset('img/DeeliveBoo-removebg-preview.png') }}" alt="">
                   
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a> --}}
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="d-flex gap-3">
                                <a class="dropdown-item" href="{{ route('admin.restaurants.index') }}">Home</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">Profilo</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Esci
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.restaurants.index') }}">{{ __('Dashboard') }}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-2">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action {{ giveActive(route('admin.restaurants.index')) }}"
                                href="{{ route('admin.restaurants.index') }}">Home</a>

                            @if ($userRestaurant)
                                <a class="list-group-item list-group-item-action {{ giveActive(route('admin.restaurants.show', $userRestaurant)) }}"
                                    href="{{ route('admin.restaurants.show', $userRestaurant) }}">{{ $userRestaurant->name }}</a>
                                <a class="list-group-item list-group-item-action {{ giveActive(route('admin.restaurants.products.index', $userRestaurant)) }}"
                                    href="{{ route('admin.restaurants.products.index', $userRestaurant) }}">Menu</a>
                                <a class="list-group-item list-group-item-action {{ giveActive(route('admin.restaurants.products.create', $userRestaurant)) }}"
                                    href="{{ route('admin.restaurants.products.create', $userRestaurant) }}"><i
                                        class="fa-regular fa-square-plus"></i> Aggiugi un prodotto</a>
                                {{-- @if (count($userRestaurant->products))
                                    <ul>
                                        @foreach ($userRestaurant->products as $product)
                                            <li class="nav-link">
                                                <a class="list-group-item list-group-item-action {{ giveActive(route('admin.restaurants.products.show', [$userRestaurant, $product])) }}"
                                                    href="{{ route('admin.restaurants.products.show', [$userRestaurant, $product]) }}">{{ $product->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif --}}
                                <a class="list-group-item list-group-item-action {{ giveActive(route('admin.restaurants.orders.index', $userRestaurant)) }}"
                                    href="{{ route('admin.restaurants.orders.index', $userRestaurant) }}">Ordini</a>
                                <a class="list-group-item list-group-item-action {{ giveActive(route('admin.restaurants.statistics.index', $userRestaurant)) }}"
                                    href="{{ route('admin.restaurants.statistics.index', $userRestaurant) }}">Statistiche</a>
                            @else
                                <a class="list-group-item list-group-item-action {{ giveActive(route('admin.restaurants.create')) }}"
                                    href="{{ route('admin.restaurants.create') }}"><i
                                        class="fa-regular fa-square-plus"></i> Crea il ristorante</a>
                            @endif
                        </div>
                    </div>

                    <div class="col-9">
                        @yield('content')
                    </div>
                </div>

            </div>

        </main>

    </div>
    <footer class="text-center text-lg-start bg-black text-muted">

<section class="d-flex justify-content-center justify-content-lg-between p-4">

    <div class="container d-flex justify-content-center justify-content-lg-between p-4">

        <div class="me-5 d-none d-lg-block">
            <span>Connettiti con noi sui nostri social:</span>
        </div>



        <div class="">
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>


    </div>
</section>



<section class="">
    <div class="container text-center text-md-start mt-5">

        <div class="row mt-3">

            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                <h6 class="__h2 text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3"></i>DeliveBoo
                </h6>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet
                    consectetur adipisicing elit.
                </p>
            </div>


            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <h6 class="__h2 text-uppercase fw-bold mb-4">
                    Servizio
                </h6>
                <p>
                    <a href="#!" class="text-reset">Rapido</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Puntuale</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Sicuro</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Peciso</a>
                </p>
            </div>



            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <h6 class="__h2 text-uppercase fw-bold mb-4">
                    Link Utili
                </h6>
                <p>
                    <a href="#!" class="text-reset">Pricing</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Settings</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Orders</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Help</a>
                </p>
            </div>



            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <h6 class="__h2 text-uppercase fw-bold mb-4">Contatto</h6>
                <p><i class="fas fa-home me-3"></i> Milano, MI 20123</p>
                <p>
                    <i class="fas fa-envelope me-3"></i>
                    deliveboo@delivery.com
                </p>
                <p><i class="fas fa-phone me-3"></i> + 39 123 25 36</p>
                <p><i class="fas fa-print me-3"></i> + 39 234 567 89</p>
            </div>

        </div>

    </div>
</section>



<div class="copyright text-center p-4">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="">by Team 6</a>
</div>

</footer>

    @stack('scripts')
</body>

<style>
   
</style>
</html>
