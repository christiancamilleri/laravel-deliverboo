
    <div class="list-group mb-5">
        <a class="list-group-item list-group-item-action {{ giveActive(route('admin.restaurants.index')) }}"
            href="{{ route('admin.restaurants.index') }}">Home</a>

        @if ($userRestaurant)
            <a class="list-group-item primary list-group-item-action {{ giveActive(route('admin.restaurants.show', $userRestaurant)) }}"
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
