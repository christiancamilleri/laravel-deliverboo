<nav class="navbar navbar-expand-md shadow-sm nav bg-black">
    <div class="container">
        @guest
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('img/DeeliveBoo-removebg-preview.png') }}" alt="">
        </a>
        @else
        <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.restaurants.index') }}">
            <img src="{{ asset('img/DeeliveBoo-removebg-preview.png') }}" alt="">
        </a>

        @endguest

        <button class="navbar-toggler  bg-primary" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto text-center d-flex justify-content-end">

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                        </li>
                    @endif
                @else

                <li class="nav-item">
                    <a class="dropdown-item nav-link" href="{{ route('admin.restaurants.index') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="dropdown-item nav-link" href="{{ url('profile') }}">Profilo</a>
                </li>

                <li class="nav-item">
                    <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        Esci
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

                @endguest

            </ul>
        </div>
    </div>
</nav>