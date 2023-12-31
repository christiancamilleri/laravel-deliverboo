@extends ('layouts.admin')

@section('content')
    <div class="container-fluid p-5 bg-dark rounded-3">

        <div class="text-center mb-3">
            <h1>Aggiorna il tuo prodotto</h1>
            <em>(puoi tornare qui in qualsiasi momento per aggiornare nuovamente questo prodotto)</em>
        </div>

        <form action="{{ route('admin.restaurants.products.update', [$restaurant, $product]) }}" method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-5 form-check">
                <label class="form-label" for="name">Nome *</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                    value="{{ old('name') ?? $product->name }}" required maxlength="100">
                @error('name')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
                @error('slug')
                    <div class="text-danger">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="mb-5 form-check">
                <label class="form-label" for="price">Prezzo *</label>
                <input step="0.01" class="form-control @error('price') is-invalid @enderror" type="number"
                    id="price" name="price" value="{{ old('price') ?? $product->price }}" required min="0"
                    max="999.99">
                @error('price')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="ms-4 form-check form-switch mb-5">
                <label class="form-check-label" for="visible">Disponibile</label>
                <input class="form-check-input" type="checkbox" role="switch" name="visible" id="visible"
                    @checked($product->visible)>
            </div>

            <div class="mb-5 form-check">
                <label class="form-label" for="description">Descrizione *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" type="number" id="description"
                    name="description" required maxlength="65535">{{ old('description') ?? $product->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="ms-0 ms-md-4 align-items-center gap-3 mb-5  d-flex flex-column flex-md-row">
                <img class="form-img rounded-circle"
                    src="{{ $product->photo ? asset('/' . $product->photo) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
                    alt="">

                <div class="form-check">
                    <label class="form-label" for="photo">Foto</label>
                    <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo"
                        name="photo" accept=".png, .jpg, .jpeg">
                    @error('photo')
                        <div class="invalid-feedback">
                            <em> {{ $message }} </em>
                        </div>
                    @enderror
                </div>

                <div
                    class="form-check align-self-center align-self-md-end d-md-flex flex-md-column align-items-md-center flex-lg-row gap-lg-3">
                    <input name="delete_photo" type="checkbox" class="btn-check" id="btn-delete-photo" autocomplete="off">
                    <label class="btn btn-outline-danger" for="btn-delete-photo">
                        <i class="fa-solid fa-trash"></i>
                    </label>
                    <small>(Seleziona per eliminare)</small>
                </div>
            </div>

            <button class="btn btn-primary ms-4 mt-3" type="submit">Modifica prodotto</button>
        </form>
    </div>
@endsection
