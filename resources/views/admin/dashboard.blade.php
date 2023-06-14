@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        <h2>{{ $restaurant->name }} di {{ $restaurant->user->name }}</h2>

        <h3>Menu</h3>
        <ul>
            @foreach ($restaurant->products as $product)
                <li>{{ $product->name }} - € {{ $product->price }}</li>
            @endforeach
        </ul>
    </div>
@endsection
