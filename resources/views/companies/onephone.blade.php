@extends('layouts.company')

@section('logo', 'ONEPHONE')
@section('price', '252')

@section('content')
    @include('onephone.overview')
    @include('onephone.spec')
    @include('onephone.environment')
    @include('onephone.rating')
    @include('onephone.footer')

    <x-floating-news-button product="onephone" />

@endsection

