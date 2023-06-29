@extends ('layouts/admin')

@section('content')
    <div class="show-restaurant">

        <div class="container-fluid p-5 mb-5 bg-dark rounded-3 cont">



            <a class="button-1 btn btn-secondary" href="{{ route('admin.restaurants.edit', $restaurant) }}">Modifica</a>

            <button type="button" class="button-2 btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRestaurant">
                Elimina
            </button>



            <h1 class="text-center mb-3">Le info del tuo ristorante</h1>


            <div class="d-flex flex-column gap-5">

                <img class="cover"
                    src="{{ $restaurant->cover ? asset('/' . $restaurant->cover) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
                    alt="cover_image">

                <div class="d-flex justify-content-start align-items-center gap-2 pt-2">

                    <img class="logo"
                        src="{{ $restaurant->logo ? asset('/' . $restaurant->logo) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
                        alt="logo">

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


                <h2>Proprietario: {{ $restaurant->user->name }}</h2>


                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Indirizzo: {{ $restaurant->address }}</li>
                    <li class="list-group-item">Cap: {{ $restaurant->postal_code }}</li>
                    <li class="list-group-item">Partita IVA: {{ $restaurant->vat_number }}</li>
                </ul>

            </div>







            <!-- Modal -->
            <div class="modal fade" id="deleteRestaurant" tabindex="-1" aria-labelledby="deleteRestaurantLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteRestaurantLabel">Eliminazione ristorante</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Sicuro di voler eliminare '{{ $restaurant->name }}'?'
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
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
    </div>
@endsection
