@extends('layouts.company')

@section('logo', 'ONEPHONE ONE')
@section('price', '299')

@section('content')
    @include('onephone.overview')
    @include('onephone.spec')
    @include('onephone.environment')
    @include('onephone.overview.footer')
@endsection
