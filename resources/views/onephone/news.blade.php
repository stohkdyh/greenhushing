@extends('layouts.news-layout')

@section('title', 'OnePhone News')

@section('content')
    <x-article-news 
        author="By Martha Stewart"
        source="The Eco Ledger"
        title="OneTech Sets a New Standard for Sustainable Smartphones"
        image="{{ asset('images/bg_zenqophone.png') }}"
        image-alt="Recyclable smartphone product shot"
        image-caption="OneTech’s new modular smartphone promotes repairability and eco-friendly materials."
        :content="view('onephone.news.content')"

        newsletter-title="Newsletter"
        newsletter-subtitle="Get the latest sustainability news weekly."
        newsletter-placeholder="Your email"
        newsletter-button-text="Subscribe"
    />
@endsection


@section('sidebar')
    <x-sidebar-news />
@endsection