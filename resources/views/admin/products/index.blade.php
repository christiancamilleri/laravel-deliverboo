@extends ('layouts.admin')

@section('content')
    <div class="product-index">

        <div class="container-fluid p-5 mb-5 bg-dark rounded-3 cont">

            <a class="btn btn-primary button-1" href="{{ route('admin.restaurants.products.create', $restaurant) }}">Aggiungi
                un
                prodotto</a>
            <a class="btn btn-primary button-2" href="{{ 'http://localhost:5174/restaurants/' . $restaurant->slug }} "
                target="_blank">Preview</a>

            <h1 class=" text-center">Il tuo menu</h1>


            @if (count($products))
                @foreach ($products as $product)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $product->photo ? asset('/' . $product->photo) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
                                    class="card-img-top product-image" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column align-items-start justify-content-between">
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
                    </div>








                    {{-- <div class="col-12 col-sm-12 col-lg-6 col-xl-4 ">
                        <div class="card">
                            <img src="{{ $product->photo ? asset('storage/' . $product->photo) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
                                class="card-img-top product-image" alt="...">
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
                    </div> --}}
                @endforeach
            @else
                <div class="alert alert-secondary" role="alert">
                    Il tuo ristorante non contiene ancora nessun prodotto
                </div>
            @endif

        </div>
    </div>

@endsection
