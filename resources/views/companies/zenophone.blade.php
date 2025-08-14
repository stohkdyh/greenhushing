@extends('layouts.company')

@section('logo', 'ZENOPHONE')
@section('price', '299')

@section('content')
    @include('zenophone.overview')
    @include('zenophone.rating')
    @include('zenophone.overview.footer')
@endsection
