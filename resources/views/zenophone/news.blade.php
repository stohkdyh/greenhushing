@php($product = 'zenophone')
@extends('layouts.news-layout')

@section('title', 'Zenophone News')

@section('content')
    <x-article-news 
        author="{{ __('By Martha Stewart') }}"
        source="Global Gadget Times"
        title="{{__('Green on the Surface? ZenoTech Faces Scrutiny Over Misleading Eco Claims')}}"
        image="{{ asset('images/zenophone-bg.webp') }}"
        image-alt="Recyclable smartphone product shot"
        image-caption="{{__('Behind the Green: ZenoPhone’s Eco Claims Under Fire.') }}"
        :content="view('zenophone.news.content')"

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
