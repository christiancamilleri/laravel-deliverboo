@extends('layouts.admin')

@section('content')
    <div>
        <h1>{{ $restaurant->name }}: Ordine #{{ $order->id }}</h1>

        <h2>Prodotti</h2>

        @foreach ($products as $product)
            <p>{{ $product->name }} - Quantità: {{ $product->pivot->quantity }}</p>
        @endforeach
    </div>
@endsection
