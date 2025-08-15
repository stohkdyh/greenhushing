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