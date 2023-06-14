@extends ('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Benvenuto {{ $userName }}</h1>

        <div class="row justify-content-center">
            @if ($restaurant)
                <div class="card w-25">
                    <img src="{{ $restaurant->logo ? asset('storage/' . $restaurant->logo) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
                        class="card-img-top" alt="Logo . {{ $restaurant->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>

                        <a class="btn btn-primary" href="{{ route('admin.restaurants.show', $restaurant) }}">Dettagli</a>
                    </div>
                </div>
            @else
                <a class="btn btn-primary" href="{{ route('admin.restaurants.create') }}">Crea il tuo ristorante</a>
            @endif

        </div>

    </div>
@endsection
