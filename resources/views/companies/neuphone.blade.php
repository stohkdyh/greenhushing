@extends('layouts.company')

@section('logo', 'NEUPHONE')
@section('price', '252')
@section('productSlug', 'neuphone')

@php
$navLinks = [
    ['label' => 'Overview', 'href' => '#overview-neuphone'],
    ['label' => 'Product', 'href' => '#product-neuphone'],
    ['label' => 'Feature', 'href' => '#feature-neuphone'],
];
@endphp

@section('content')
    <section id="overview-neuphone">
        @include('neuphone.overview')
    </section>

    <section id="product-neuphone">
        @include('neuphone.overview.product')
    </section>

    <section id="feature-neuphone">
        @include('neuphone.overview.product2')
        @include('neuphone.overview.product3')
        @include('neuphone.overview.product4')
    </section>

    @include('neuphone.overview.footer')
    <x-floating-news-button product="neuphone" />
@endsection
