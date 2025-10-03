@extends('layouts.company')

@section('logo', 'XARELPHONE')
@section('price', '252')
@section('productSlug', 'xarelphone')

@php
$navLinks = [
    ['label' => 'Overview', 'href' => '#overview-xarelphone'],
    ['label' => 'Product', 'href' => '#product-xarelphone'],
    ['label' => 'Feature', 'href' => '#feature-xarelphone'],
];
@endphp

@section('content')
    <section id="overview-xarelphone">
        @include('xarelphone.overview')
    </section>

    <section id="product-xarelphone">
        @include('xarelphone.overview.product')
    </section>

    <section id="feature-xarelphone">
        @include('xarelphone.overview.product2')
        @include('xarelphone.overview.product3')
        @include('xarelphone.overview.product4')
    </section>

    @include('xarelphone.overview.footer')
    <x-floating-news-button product="xarelphone" />
@endsection
