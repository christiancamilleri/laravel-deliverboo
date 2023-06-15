@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="alert alert-danger">
            Accesso non autorizzato
        </div>

        {{-- {{ dd($userRestaurant) }} --}}
        <a href="{{ route('admin.restaurants.index') }}">Torna alla home</a>
    </div>
@endsection
