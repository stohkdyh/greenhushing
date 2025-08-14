@extends('layouts.company')

@section('logo', 'XARELPHONE')
@section('price', '299')

@section('content')
    @include('xarelphone.overview')
    @include('xarelphone.rating')
    @include('xarelphone.overview.footer')

    <!-- Add floating rating button -->
    <x-floating-rating-button product="xarelphone" />
@endsection
