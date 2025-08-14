@extends('layouts.news-layout')

@section('title', 'OnePhone News')

@section('content')
    <x-article-news 
        author="{{__('By Martha Stewart') }}"
        source="{{__('The Eco Ledger') }}"
        title="{{__('OneTech Sets a New Standard for Sustainable Smartphones') }}"
        image="{{ asset('images/bg_zenqophone.png') }}"
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