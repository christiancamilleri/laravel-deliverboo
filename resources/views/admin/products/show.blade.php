@extends ('layouts.admin')

@section('content')
    {{$product->name}}
    <img src="{{asset('storage/' . $product->photo)}}" alt="">
@endsection
