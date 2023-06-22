@extends ('layouts/admin')

@section('content')
    <table class="table table-hover">
        <thead class="text-bg-danger">
            <th>
                Data e orario
            </th>
            <th>
                Numero ordine
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
                    <td>{{ $order->id }}</td>
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
@endsection