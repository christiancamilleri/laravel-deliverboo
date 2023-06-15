<?php
    $user = Auth::user();

    $UserRestaurant = Auth::user()->restaurant;
    

    function giveActive($route) {
        if($route == URL::full()) {
            return 'active';
        }
    }
?>


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        DeliveBoo
        {{-- {{ config('app.name', 'Laravel') }} --}}
    </title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.restaurants.index') }}">
                    Deliveboo
                    {{-- config('app.name', 'Laravel') --}}
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
                            <li class="nav-item dropdown">
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
                            </li>
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
                                <a class="list-group-item list-group-item-action {{giveActive(route('admin.restaurants.index'))}}" href="{{ route('admin.restaurants.index') }}">home</a>
 
                               @if($UserRestaurant)
                                <a class="list-group-item list-group-item-action {{giveActive(route('admin.restaurants.show', $UserRestaurant))}}" href="{{ route('admin.restaurants.show', $UserRestaurant) }}">{{$UserRestaurant->name}}</a>
                                <a class="list-group-item list-group-item-action {{giveActive(route('admin.restaurants.products.index', $UserRestaurant))}}" href="{{ route('admin.restaurants.products.index', $UserRestaurant) }}">Menu</a>
                                <a class="list-group-item list-group-item-action {{giveActive(route('admin.restaurants.products.create', $UserRestaurant))}}" href="{{ route('admin.restaurants.products.create', $UserRestaurant) }}"><i class="fa-regular fa-square-plus"></i> Aggiugi un prodotto</a>
                                    @if(count($UserRestaurant->products))
                                    <ul>
                                        @foreach ($UserRestaurant->products as $product)
                                            <li class="nav-link">
                                                <a class="list-group-item list-group-item-action {{giveActive(route('admin.restaurants.products.show', [$UserRestaurant, $product]))}}" href="{{ route('admin.restaurants.products.show', [$UserRestaurant, $product]) }}">{{ $product->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                @else
                                <a class="list-group-item list-group-item-action {{giveActive(route('admin.restaurants.create'))}}" href="{{ route('admin.restaurants.create') }}"><i class="fa-regular fa-square-plus"></i> Crea il ristorante</a>
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
</body>

</html>
