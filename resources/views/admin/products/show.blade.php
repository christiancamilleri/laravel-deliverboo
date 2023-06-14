@extends ('layouts.admin')

@section('content')
    <div class="container">
        {{ $product->name }}
        <img src="{{ asset('storage/' . $product->photo) }}" alt="">
    </div>
@endsection
