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