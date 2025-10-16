@php($product = 'onephone')
@extends('layouts.news-layout')

@section('title', 'OnePhone News')

@section('content')
    <x-article-news 
        author="{{__('By Martha Stewart') }}"
        source="{{__('The Eco Ledger') }}"
        title="{{__('OneTech Sets a New Standard for Sustainable Smartphones') }}"
        image="{{ asset('images/bg_onephone.png') }}"
        image-alt="{{__('Recyclable smartphone product shot') }}"
        image-caption="{{__('OneTech’s new modular smartphone promotes repairability and eco-friendly materials.') }}"
        :content="view('onephone.news.content')"

        newsletter-title="{{__('Newsletter') }}"
        newsletter-subtitle="{{__('Get the latest sustainability news weekly.') }}"
        newsletter-placeholder="{{__('Your email') }}"
        newsletter-button-text="{{__('Subscribe') }}"
    />
@endsection


@section('sidebar')
    <x-sidebar-news />
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
