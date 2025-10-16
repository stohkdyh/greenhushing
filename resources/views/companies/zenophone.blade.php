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

@push('scripts')
<script>
    const startTime = Date.now();

    window.addEventListener('unload', function() {
        const totalSeconds = Math.floor((Date.now() - startTime) / 1000);

        const data = new FormData();
        data.append('total_time_seconds', totalSeconds);
        data.append('_token', '{{ csrf_token() }}');

        navigator.sendBeacon("{{ route('track.time') }}", data);
    });
</script>
@endpush