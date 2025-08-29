@extends('layouts.company')

@section('logo', 'ZENOPHONE')
@section('price', '252')

@section('content')
    @include('zenophone.overview')
    @include('zenophone.rating')
    @include('zenophone.footer')
    <x-floating-rating-button product="zenophone" />
@endsection
