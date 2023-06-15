@extends ('layouts.admin')

@section('content')
<div class="container px-5 my-5">

    <form action="{{ route('admin.restaurants.products.update', [$restaurant, $product]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="my-5 form-check">
            <label class="form-label" for="name">Nome</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                value="{{ old('name') ?? $product->name }}">
            @error('name')
                <div class="invalid-feedback">
                    <em> {{ $message }} </em>
                </div>
            @enderror
        </div>

        <div class="my-5 form-check">
            <label class="form-label" for="price">Prezzo</label>
            <input step="0.01" class="form-control @error('price') is-invalid @enderror" type="number"
                id="price" name="price" value="{{ old('price') ?? $product->price }}">
            @error('address')
                <div class="invalid-feedback">
                    <em> {{ $message }} </em>
                </div>
            @enderror
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="visible" id="visible" @checked(old('visible') ?? $product->visible)>
            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
        </div>

        <div class="my-5 form-check">
            <label class="form-label" for="description">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" type="number" id="description"
                name="description">{{ old('description') ?? $product->description }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    <em> {{ $message }} </em>
                </div>
            @enderror
        </div>

        <div class="my-5 form-check">
            <label class="form-label" for="photo">Foto :</label>
            <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo"
                name="photo">
            @error('photo')
                <div class="invalid-feedback">
                    <em> {{ $message }} </em>
                </div>
            @enderror
        </div>

        <button class="btn btn-secondary ms-4 mt-3" type="submit">Modifica prodotto</button>
    </form>
</div>
@endsection