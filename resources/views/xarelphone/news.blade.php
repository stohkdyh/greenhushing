@extends('layouts.news-layout')

@section('title', 'Xarelphone News')

@section('content')
    <x-article-news 
        author="By Martha Stewart"
        source="Global Gadget Times"
        title="XarelTech’s New Flagship Phone Impresses on Design — But Remains Silent on Sustainability"
        image="{{ asset('images/bg_zenqophone.png') }}"
        image-alt="Recyclable smartphone product shot"
        image-caption="OneTech’s new modular smartphone promotes repairability and eco-friendly materials."
        :content="view('xarelphone.news.content')"

        newsletter-title="Newsletter"
        newsletter-subtitle="Get the latest sustainability news weekly."
        newsletter-placeholder="Your email"
        newsletter-button-text="Subscribe"
    />
@endsection


@section('sidebar')
    <x-sidebar-news />
@endsection