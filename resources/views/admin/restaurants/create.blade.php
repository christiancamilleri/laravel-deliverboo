@extends ('layouts/admin')

@section('content')
<div class="container px-5 my-5" >

    <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="my-5 form-check" >
            <label class="form-label" for="name">Nome ristorante:</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback">
                <em> {{$message}} </em>
            </div>
            @enderror
        </div>

        <div class="my-5 form-check" >
            <label class="form-label" for="address">Indirizzo:</label>
            <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{old('address')}}">
            @error('address')
            <div class="invalid-feedback">
                <em> {{$message}} </em>
            </div>
            @enderror
        </div>


        <div class="my-5 form-check" >
            <label class="form-label" for="postal_code">Cap:</label>
            <input class="form-control @error('postal_code') is-invalid @enderror" type="number" id="postal_code" name="postal_code" value="{{old('postal_code')}}">
            @error('postal_code')
            <div class="invalid-feedback">
                <em> {{$message}} </em>
            </div>
            @enderror
        </div>


        <div class="my-5 form-check" >
            <label class="form-label" for="vat_number">Partita IVA:</label>
            <input class="form-control @error('vat_number') is-invalid @enderror" type="text" id="vat_number" name="vat_number" value="{{old('vat_number')}}">
            @error('vat_number')
            <div class="invalid-feedback">
                <em> {{$message}} </em>
            </div>
            @enderror
        </div>

        <div class="my-5 form-check" >
            <label class="form-label" for="logo">Immagine logo:</label>
            <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo" >
            @error('logo')
            <div class="invalid-feedback">
                <em> {{$message}} </em>
            </div>
            @enderror
        </div>

        <div class="my-5 form-check" >
            <label class="form-label" for="cover">Immagine copertina:</label>
            <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover" name="cover" >
            @error('cover')
            <div class="invalid-feedback">
                <em> {{$message}} </em>
            </div>
            @enderror
        </div>



        <div class="form-group form-check my-5 form-group d-flex gap-3 align-items-center">
            <label>Tipologia:</label>
            <div class="row">
                @foreach($typologies as $typology)
                <div class="form-check col-2">
                    <input type="checkbox" id="typology-{{$typology->id}}" name="typologies[]" value="{{$typology->id}}" @checked(in_array($typology->id, old('typologies', [])))>
                    <label for="typology-{{$typology->id}}">{{$typology->name}}</label>
                </div>
                @endforeach
                @error('typologies')
                <div class="text-danger">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
        </div>
        



        <button class="btn btn-secondary ms-4 mt-3" type="submit">Crea ristorante</button>
 
    </form>
</div>

@endsection
