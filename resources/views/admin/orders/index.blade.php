@extends ('layouts/admin')

@section('content')


@if (count($orders))
    <div class="table-responsive container-fluid p-5 bg-dark rounded-3">

        <table class="table align-middle table-hover d-none d-xl-block">
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

        <table class="table align-middle table-hover d-none d-md-block d-xl-none">
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

        <table class="table align-middle table-hover d-block d-md-none">
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
@else
<div class="alert alert-secondary" role="alert">
    Il tuo ristorante non ha ancora nessun ordine
</div>
@endif

    
    </div>
@endsection
