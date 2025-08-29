@extends('layouts.company')

@section('logo', 'XARELPHONE')
@section('price', '252')

@section('content')
    @include('xarelphone.overview')
    @include('xarelphone.rating')
    @include('xarelphone.overview.footer')

    <!-- Add floating rating button -->
    <x-floating-rating-button product="xarelphone" />
@endsection
