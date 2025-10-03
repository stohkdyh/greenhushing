@extends('layouts.company')

@section('logo', 'ZENOPHONE')
@section('price', '252')
@section('productSlug', 'zenophone')

@php
$navLinks = [
    ['label' => 'Overview', 'href' => '#overview-zenophone'],
    ['label' => 'Product', 'href' => '#product-zenophone'],
    ['label' => 'Feature', 'href' => '#feature-zenophone'],
    ['label' => 'Sustainability', 'href' => '#sustainability-zenophone'],
];
@endphp


@section('content')
    <section id="overview-zenophone">
        @include('zenophone.overview')
    </section>

    <section id="product-zenophone">
        @include('zenophone.overview.product')
    </section>

    <section id="feature-zenophone">
        @include('zenophone.overview.product2')
        @include('zenophone.overview.product3')
        @include('zenophone.overview.product4')
    </section>

    <section id="sustainability-zenophone">
        @include('zenophone.overview.sustainability')
    </section>
    

    @include('zenophone.footer')
    <x-floating-news-button product="zenophone" />
@endsection

