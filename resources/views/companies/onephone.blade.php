@extends('layouts.company')

@section('logo', 'ONEPHONE')
@section('price', '252')
@section('productSlug', 'onephone')

@php
$navLinks = [
    ['label' => 'Overview', 'href' => '#overview-onephone'],
    ['label' => 'Product', 'href' => '#product-onephone'],
    ['label' => 'Feature', 'href' => '#feature-onephone'],
    ['label' => 'Product Environmental Report', 'href' => '#productenvironmentalreport-onephone'],
];
@endphp

@section('content')
    <section id="overview-onephone">
        @include('onephone.overview')
    </section>

    <section id="product-onephone">
        @include('onephone.overview.product')
    </section>

    <section id="feature-onephone">
        @include('onephone.overview.feature')
        @include('onephone.overview.feature2')
        @include('onephone.overview.feature3')
        @include('onephone.overview.program')
    </section>

    <section id="productenvironmentalreport-onephone">
        @include('onephone.environment')
    </section>

    @include('onephone.footer')
    <x-floating-news-button product="onephone" />
@endsection

@push('scripts')
<script>
    const startTime = Date.now();

    window.addEventListener('visibilitychange', function() {
        const totalSeconds = Math.floor((Date.now() - startTime) / 1000);

        const data = new FormData();
        data.append('total_time_seconds', totalSeconds);
        data.append('_token', '{{ csrf_token() }}');

        navigator.sendBeacon("{{ route('track.time') }}", data);
    });
</script>
@endpush