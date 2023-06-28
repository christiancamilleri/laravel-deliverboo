@extends ('layouts/admin')

@section('content')
    <div class="container-fluid p-5 bg-dark rounded-3">

        <div class="text-center mb-5">

            <h1 class="text-center">Aggiunta di un prodotto</h1>
            <em>(riempi i campi relativi al tuo nuovo prodotto, una volta aggiunto potrai modificarlo in un secondo momento)</em>
        </div>

        <form action="{{ route('admin.restaurants.products.store', $restaurant) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="mb-5 form-check">
                <label class="form-label" for="name">Nome *</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                    value="{{ old('name') }}" required maxlength="100">
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
                    id="price" name="price" value="{{ old('price') }}" required min="0" max="999.99">
                @error('price')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="ms-4 form-check form-switch mb-5">
                <label class="form-check-label" for="visible">Disponibilità</label>
                <input class="form-check-input" type="checkbox" role="switch" name="visible" id="visible" checked>
            </div>

            <div class="mb-5 form-check">
                <label class="form-label" for="description">Descrizione *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" type="number" id="description"
                    name="description" required maxlength="65535">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="mb-5 form-check">
                <label class="form-label" for="photo">Foto</label>
                <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo"
                    name="photo" accept=".png, .jpg, .jpeg">
                @error('photo')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <button class="btn btn-primary ms-4 mt-3" type="submit">Crea prodotto</button>
        </form>
    </div>
@endsection
