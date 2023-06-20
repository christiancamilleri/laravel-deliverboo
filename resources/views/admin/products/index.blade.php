@extends ('layouts.admin')

@section('content')
    <div class="container">

        <h1 class="my-5 text-center">Il tuo menu</h1>

        <div class="my-5 text-center">
            <a class="btn btn-primary" href="{{ route('admin.restaurants.products.create', $restaurant) }}">Aggiungi un
                prodotto</a>
            <a class="btn btn-primary" href="{{ 'http://localhost:5173/restaurants/' . $restaurant->slug }} ">Preview</a>
        </div>


        @if (count($restaurant->products))
            <div class="row row-gap-4 my-5">
                @foreach ($restaurant->products as $product)
                    <div class="col-12 col-sm-12 col-lg-6 col-xl-4">
                        <div class="card">
                            <img src="{{ $product->photo ? asset('storage/' . $product->photo) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">{{ $product->price }} Euro</p>
                                @if ($product->visible)
                                    <span class="badge rounded-pill text-bg-success card-title">Disponibile</span>
                                @else
                                    <span class="badge rounded-pill text-bg-danger card-title">Non disponibile</span>
                                @endif
                                <div>
                                    <a href="{{ route('admin.restaurants.products.show', [$restaurant->slug, $product->slug]) }}"
                                        class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-secondary" role="alert">
                Il tuo ristorante non contiene ancora nessun prodotto
            </div>
        @endif

    </div>

@endsection


<style>
    img {
        height: 250px;
        object-fit: cover
    }
</style>
