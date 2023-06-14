@extends ('layouts.admin')

@section('content')
    @if(count($products))

    @foreach ($products as $product)
    <ul>
        <li>
            {{ $product->name }}
        </li>
        <li>
            <a class="btn btn-primary" href="{{ route('admin.restaurants.products.show', [$restaurant->slug, $product->slug]) }}">Dettagli</a>
        </li>
    </ul>
    @endforeach
    @else
    non hai prodotti

    @endif

    <a class="btn btn-primary" href="{{route('admin.restaurants.products.create', $restaurant->id)}}">Aggiungi un prodotto</a>
@endsection
