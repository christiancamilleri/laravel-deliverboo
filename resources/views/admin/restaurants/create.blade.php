@extends ('layouts/admin')

@section('content')
    <div class="container p-5 my-5 bg-dark rounded-3">

        <form id="restaurant-form" action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="my-5 form-check">
                <label class="form-label" for="name">Nome ristorante *</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                    value="{{ old('name') }}" required maxlength="100">
                @error('name')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="my-5 form-check">
                <label class="form-label" for="address">Indirizzo *</label>
                <input class="form-control @error('address') is-invalid @enderror" type="text" id="address"
                    name="address" value="{{ old('address') }}" required maxlength="255">
                @error('address')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>


            <div class="my-5 form-check">
                <label class="form-label" for="postal_code">Cap *</label>
                <input maxlength="5" minlength="5" class="form-control @error('postal_code') is-invalid @enderror"
                    type="text" pattern="[0-9]{5}" id="postal_code" name="postal_code" value="{{ old('postal_code') }}"
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
                    value="{{ old('vat_number') }}" required maxlength="13">
                @error('vat_number')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="my-5 form-check">
                <label class="form-label" for="logo">Immagine logo</label>
                <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo"
                    name="logo">
                @error('logo')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="my-5 form-check">
                <label class="form-label" for="cover">Immagine copertina</label>
                <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover"
                    name="cover">
                @error('cover')
                    <div class="invalid-feedback">
                        <em> {{ $message }} </em>
                    </div>
                @enderror
            </div>

            <div class="form-group form-check my-5 form-group d-flex gap-3 align-items-center">
                <label>Tipologia *</label>
                <div class="row">
                    @foreach ($typologies as $typology)
                        <div class="form-check col-3 d-flex align-items-center gap-2">
                            <input type="checkbox" id="typology-{{ $typology->id }}" name="typologies[]"
                                value="{{ $typology->id }}" @checked(in_array($typology->id, old('typologies', [])))>
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

            <button class="btn btn-primary ms-4 mt-3" type="submit">Crea ristorante</button>

        </form>
    </div>

    @push('scripts')
        <script src="{{ mix('resources/js/checkboxValidation.js') }}" type="text/javascript"></script>
    @endpush
@endsection
