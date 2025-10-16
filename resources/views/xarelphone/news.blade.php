@php($product = 'xarelphone')
@extends('layouts.news-layout')

@section('title', 'Xarelphone News')

@section('content')
    <x-article-news 
        author="{{ __('By Martha Stewart') }}"
        source="Global Gadget Times"
        title="{{__('XarelTech’s New Flagship Phone Impresses on Design — But Remains Silent on Sustainability')}}"
        image="{{ asset('images/xarelphone-bg.png') }}"
        image-alt="Recyclable smartphone product shot"
        image-caption="{{__('XarelTech’s Stylish Debut — Sustainability Still a Mystery.') }}"
        :content="view('xarelphone.news.content')"

        newsletter-title="{{ __('Newsletter') }}"
        newsletter-subtitle="{{ __('Get the latest sustainability news weekly.') }}"
        newsletter-placeholder="{{ __('Your email') }}"
        newsletter-button-text="{{ __('Subscribe') }}"
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
