@extends ('layouts/admin')

@section('content')
    <div class="container p-5 mb-5 bg-dark rounded-3">

        <div class="d-flex justify-content-center align-items-center gap-3 pb-5">
            <a class="btn btn-primary" href="{{ route('admin.restaurants.products.index', $restaurant->slug) }}">Vai al
                Menu</a>
            <a class="btn btn-outline-primary" href="{{ route('admin.restaurants.orders.index', $restaurant) }}">Vai agli
                ordini</a>
            <a class="btn btn-secondary" href="{{ route('admin.restaurants.edit', $restaurant) }}">Modifica</a>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRestaurant">
                Elimina
            </button>

        </div>

        <img class="cover" src="{{ $restaurant->cover ? asset('storage/' . $restaurant->cover) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
            alt="cover_image" >

        <div class="d-flex justify-content-start align-items-center gap-2 pt-2">

            <img class="logo" src="{{ $restaurant->logo ? asset('storage/' . $restaurant->logo) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
                alt="logo" >

            <div>
                <div>
                    @foreach ($restaurant->typologies as $typology)
                        <span class="badge" style=" background-color: {{ $typology->color }}">
                            {{ $typology->name }}
                        </span>
                    @endforeach
                </div>
                <h1>{{ $restaurant->name }}</h1>

                <small>{{ $restaurant->slug }}</small>
            </div>

        </div>


        <h2>{{ $restaurant->user->name }}</h2>


        <ul class="list-group list-group-flush py-4">
            <li class="list-group-item">Indirizzo: {{ $restaurant->address }}</li>
            <li class="list-group-item">Partita IVA: {{ $restaurant->vat_number }}</li>
            <li class="list-group-item">Codice postale: {{ $restaurant->postal_code }}</li>
        </ul>







        <!-- Modal -->
        <div class="modal fade" id="deleteRestaurant" tabindex="-1" aria-labelledby="deleteRestaurantLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteRestaurantLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Sicuro di voler eliminare il ristorante: {{ $restaurant->name }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
