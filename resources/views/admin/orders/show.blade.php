@extends('layouts.admin')

@section('content')
    <div class="container p-5 mb-5 bg-dark rounded-3 ">
        <h1>{{ $restaurant->name }}: Ordine #{{ $order->id }}</h1>

        <h2>Prodotti</h2>

        @foreach ($order->products()->withTrashed()->get() as $product)
            <p>{{ $product->name }} - Quantità: {{ $product->pivot->quantity }}</p>
        @endforeach
    </div>
@endsection
