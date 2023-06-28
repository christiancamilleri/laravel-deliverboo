@extends('layouts.admin')

@section('content')
    <div class="container-fluid p-5 mb-5 bg-dark rounded-3 ">
        <h6>Data: {{ $order->created_at->format('Y-m-d') }}</h6>
        <h6>Orario: {{ $order->created_at->format('H:i:s') }}</h6>
        <hr>
        <h4>Dettagli cliente</h4>
        <h6>Da: {{ $order->name }}</h6>
        <h6>E-mail: {{ $order->email }}</h6>
        <h4>Indirizzo</h4>
        <h6>Via: {{ $order->address }}</h6>
        <h6>Cap: {{ $order->postal_code }}</h6>
        <h6>Telefono: {{ $order->phone }}</h6>
        <hr>






        

        <h4>Prodotti acquistati:</h4>

        @foreach ($order->products()->withTrashed()->get() as $product)
            <p><em>{{ $product->name }} - Quantità: {{ $product->pivot->quantity }}</em></p>
        @endforeach

        <div class="fs-1">
            Totale ordine: {{ $order->total_price }}
        </div>
    </div>
@endsection
