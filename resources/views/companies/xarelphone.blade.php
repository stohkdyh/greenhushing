@extends('layouts.company')

@section('logo', 'XARELPHONE')
@section('price', '252')

@section('content')
    @include('xarelphone.overview')
    {{-- @include('xarelphone.rating') --}}
    @include('xarelphone.overview.footer')

    <x-floating-news-button product="xarelphone" />
@endsection
