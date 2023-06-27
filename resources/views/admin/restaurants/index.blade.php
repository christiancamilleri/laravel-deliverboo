@extends ('layouts.admin')

@section('content')
    <div class="container p-5 my-5 bg-dark rounded-3">
        <h1 class="text-center ">Benvenuto {{ $userName }}</h1>

        <div class="row justify-content-center my-5">
            @if ($restaurant)
                <div class="card d-flex flex-column align-items-center">
                    <img src="{{ $restaurant->logo ? asset('storage/' . $restaurant->logo) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
                        class="card-img-top w-50 restaurant-image" alt="Logo . {{ $restaurant->name }}">

                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>

                        <a class="btn btn-primary" href="{{ route('admin.restaurants.show', $restaurant) }}">Dettagli</a>
                    </div>
                </div>
            @else
                <h4 class="text-center">Inizia creando il tuo ristorante</h4>
                <a class="btn btn-primary" href="{{ route('admin.restaurants.create') }}">Crea il tuo ristorante</a>
            @endif
        </div>

    </div>
@endsection
