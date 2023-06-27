@extends ('layouts/admin')

@section('content')
@if (count($orders))
    <div class="table-responsive container p-5 mb-5 bg-dark rounded-3">

        <table class="table align-middle table-hover">
            <thead class="text-bg-danger">
                <th>
                    Data e orario
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
                    Optional info
                </th>
                <th>
                    Stato ordine
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
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->postal_code }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->optional_info ?? 'Nessuna' }}</td>
                        <td>{{ $order->status ? 'ok' : 'no' }}</td>
                        <td>€ {{ $order->total_price }}</td>
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
