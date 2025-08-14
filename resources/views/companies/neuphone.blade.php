@extends('layouts.company')

@section('logo', 'NEUPHONE')
@section('price', '299')

@section('content')
    @include('neuphone.overview')
    @include('neuphone.rating')
    @include('neuphone.overview.footer')
    <x-floating-rating-button product="neuphone" />
@endsection
