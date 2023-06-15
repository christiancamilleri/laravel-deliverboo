@extends ('layouts.admin')

@section('content')
    <div class="container">
        <div class="my-1 d-flex justify-content-center gap-3">
            <a class="btn btn-secondary" href="{{ route('admin.restaurants.products.edit', [$restaurant, $product]) }}">Modifica</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProduct">
                Elimina
            </button>
    
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="my-5">
                    <h1>{{ $product->name }}</h1>
                    <h3>{{$product->price}} Euro</h3>
                    @if ($product->visible)
                        <span class="badge rounded-pill text-bg-success card-title">Disponibile</span>
                    @else
                        <span class="badge rounded-pill text-bg-danger card-title">Non disponibile</span>
                    @endif
                    <p>{{$product->description}}</p>
                    <img class="w-50" src="{{ $product->photo ? asset('storage/' . $product->photo) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}" alt="">
                </div>
            </div>
        </div>


    </div>




    
    <!-- Modal -->
    <div class="modal fade" id="deleteProduct" tabindex="-1" aria-labelledby="deleteProductLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteProductLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sicuro di voler eliminare il prodotto: {{ $product->name }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('admin.restaurants.products.destroy', [$restaurant, $product]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


            @endsection