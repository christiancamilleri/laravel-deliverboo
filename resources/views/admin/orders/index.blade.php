@extends ('layouts/admin')

@section('content')


@if (count($orders))
    

<div class="table-responsive container p-5 bg-dark rounded-3 d-none d-xl-block">

    <table class="table align-middle table-hover ">
        <thead class="text-bg-danger">
            <th>
                Data
            </th>
            <th>
                Nome
            </th>
            <th>
                Email
            </th>
            <th>
                Email
            </th>
            <th>
                Cap
            </th>
            <th>
                Indirizzo
            </th>
            <th>
                Status
            </th>
            <th>
                Totale
            </th>
            <th>
                Prodotti
            </th>
        </thead>

        <tbody>

            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->postal_code }}</td>
                    <td>{{ $order->address }}</td>
                    @if($order->status)

                    <td class="text-success"><i class="fa-solid fa-circle-check"></i></td>
                    @else
                    <td class="text-danger"><i class="fa-regular fa-circle-xmark"></i></i></td>
                    @endif
                    <td>€ {{ $order->total_price }}</td>
                    <td><a href="{{ route('admin.restaurants.orders.show', [$restaurant, $order]) }}"><i
                                class="fa-solid fa-cart-shopping"></i></a></td>
                </tr>
            @endforeach

        </tbody>

    </table>
</div>


<div class="table-responsive container-fluid p-5 bg-dark rounded-3 d-none d-md-block d-xl-none ps-2">
    <table class="table align-middle table-hover ">
        <thead class="text-bg-danger">
            <th>
                Data
            </th>
            <th>
                Nome
            </th>
            <th>
                Email
            </th>
            <th>
                Telefono
            </th>
            <th>
                Status
            </th>
            <th>
                Totale
            </th>
            <th>
                Prodotti
            </th>
        </thead>

        <tbody>

            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>

                    @if($order->status)
                    <td class="text-success"><i class="fa-solid fa-circle-check"></i></td>
                    @else
                    <td class="text-danger"><i class="fa-regular fa-circle-xmark"></i></i></td>
                    @endif
                    <td>€ {{ $order->total_price }}</td>
                    <td><a href="{{ route('admin.restaurants.orders.show', [$restaurant, $order]) }}"><i
                                class="fa-solid fa-cart-shopping"></i></a></td>
                </tr>
            @endforeach

        </tbody>

    </table>
</div>


<div class="table-responsive container p-5 bg-dark rounded-3 d-block d-md-none">
    <table class="table align-middle table-hover">
        <thead class="text-bg-danger">
            <th>
                Data
            </th>
            <th>
                Totale
            </th>
            <th>
                Status
            </th>
            <th>
                Prodotti
            </th>
        </thead>

        <tbody>

            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>€ {{ $order->total_price }}</td>
                    @if($order->status)
                    <td class="text-success"><i class="fa-solid fa-circle-check"></i></td>
                    @else
                    <td class="text-danger"><i class="fa-regular fa-circle-xmark"></i></i></td>
                    @endif
                    <td><a href="{{ route('admin.restaurants.orders.show', [$restaurant, $order]) }}"><i
                                class="fa-solid fa-cart-shopping"></i></a></td>
                </tr>
            @endforeach

        </tbody>

    </table>
</div>


@else
<div class="alert alert-secondary" role="alert">
    Il tuo ristorante non ha ancora nessun ordine
</div>
@endif

@endsection
