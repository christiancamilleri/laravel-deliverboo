@extends ('layouts/admin')

@section('content')
    <div class="container px-5 my-5">
        <form id="restaurant-form" action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST"
            enctype="multipart/form-data">

            @method('PUT')
            @csrf

            <div class="my-5 form-check">
                <label class="form-label" for="name">Nome ristorante *</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                    maxlength="100" value="{{ old('name') ?? $restaurant->name }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="my-5 form-check">
                <label class="form-label" for="address">Indirizzo *</label>
                <input class="form-control @error('address') is-invalid @enderror" type="text" id="address"
                    maxlength="255" name="address" value="{{ old('address') ?? $restaurant->address }}" required>
                @error('address')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="my-5 form-check">
                <label class="form-label" for="postal_code">Cap *</label>
                <input class="form-control @error('postal_code') is-invalid @enderror" pattern="[0-9]{5}" type="text"
                    id="postal_code" name="postal_code" value="{{ old('postal_code') ?? $restaurant->postal_code }}"
                    required maxlength="5">
                @error('postal_code')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="my-5 form-check">
                <label class="form-label" for="vat_number">Partita IVA *</label>
                <input class="form-control @error('vat_number') is-invalid @enderror" type="text"
                    style="text-transform: uppercase;" pattern="[A-Za-z]{2}[0-9]{11}" id="vat_number" name="vat_number"
                    value="{{ old('vat_number') ?? $restaurant->vat_number }}" required maxlength="13">
                @error('vat_number')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="ms-4 d-flex align-items-end gap-3 my-5">
                <img class="form-img"
                    src="{{ $restaurant->logo ? asset('storage/' . $restaurant->logo) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
                    alt="logo_image">

                <div class="form-check">
                    <label class="form-label" for="logo">Immagine logo</label>
                    <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo"
                        name="logo" accept=".png, .jpg, .jpeg">
                    @error('logo')
                        <div class="invalid-feedback">
                            <em> {{ $message }} </em>
                        </div>
                    @enderror
                </div>

                <div class="form-check">
                    <input name="delete_logo" type="checkbox" class="btn-check" id="btn-delete-logo" autocomplete="off">
                    <label class="btn btn-outline-danger" for="btn-delete-logo">
                        <i class="fa-solid fa-trash"></i>
                    </label>
                </div>
            </div>

            <div class="ms-4 d-flex align-items-end gap-3 my-5">
                <img class="form-img"
                    src="{{ $restaurant->cover ? asset('storage/' . $restaurant->cover) : 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg' }}"
                    alt="cover_image">

                <div class="form-check">
                    <label class="form-label" for="cover">Immagine copertina</label>
                    <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover"
                        name="cover" accept=".png, .jpg, .jpeg">
                    @error('cover')
                        <div class="invalid-feedback">
                            <em> {{ $message }} </em>
                        </div>
                    @enderror
                </div>

                <div class="form-check">
                    <input name="delete_cover" type="checkbox" class="btn-check" id="btn-delete-cover" autocomplete="off">
                    <label class="btn btn-outline-danger" for="btn-delete-cover">
                        <i class="fa-solid fa-trash"></i>
                    </label>
                </div>
            </div>

            <div class="form-group form-check my-5 form-group d-flex gap-3 align-items-center">
                <label>Tipologia *</label>
                <div class="row">
                    @foreach ($typologies as $typology)
                        <div class="form-check col-3 d-flex align-items-center gap-2">

                            @if ($errors->any())
                                <input class="checkbox" type="checkbox" id="typology-{{ $typology->id }}"
                                    name="typologies[]" value="{{ $typology->id }}" @checked(in_array($typology->id, old('typologies', [])))>
                            @else
                                <input class="checkbox" type="checkbox" id="typology-{{ $typology->id }}"
                                    name="typologies[]" value="{{ $typology->id }}" @checked($restaurant->typologies->contains($typology))>
                            @endif
                            <label for="typology-{{ $typology->id }}">{{ $typology->name }}</label>

                        </div>
                    @endforeach
                    @error('typologies')
                        <div class="text-danger">
                            <em> {{ $message }} </em>
                        </div>
                    @enderror
                    <div id="front-typologies-error" class="text-danger">
                    </div>
                </div>
            </div>

            <button class="btn btn-secondary ms-4 mt-3" type="submit">Modifica ristorante</button>
        </form>
    </div>

    @push('scripts')
        <script src="{{ mix('resources/js/checkboxValidation.js') }}" type="text/javascript"></script>
    @endpush
@endsection
