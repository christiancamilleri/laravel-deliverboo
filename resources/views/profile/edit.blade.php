@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <h2 class="fs-4 text-white mb-4">
        Profilo
    </h2>
    <div class="card p-4 mb-4 bg-dark shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bg-dark shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bg-dark shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
