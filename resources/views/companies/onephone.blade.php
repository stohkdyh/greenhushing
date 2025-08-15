@extends('layouts.company')

@section('logo', 'ONEPHONE')
@section('price', '299')

@section('content')
    @include('onephone.overview')
    @include('onephone.spec')
    @include('onephone.environment')
    @include('onephone.rating')
    @include('onephone.footer')

    <x-floating-rating-button product="onephone" />
@endsection
