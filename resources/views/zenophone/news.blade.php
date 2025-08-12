@extends('layouts.news-layout')

@section('title', 'Zenophone News')

@section('content')
    <x-article-news 
        author="By Martha Stewart"
        source="Global Gadget Times"
        title="Green on the Surface? ZenoTech Faces Scrutiny Over Misleading Eco Claims"
        image="{{ asset('images/bg_zenqophone.png') }}"
        image-alt="Recyclable smartphone product shot"
        image-caption="OneTech’s new modular smartphone promotes repairability and eco-friendly materials."
        :content="view('zenophone.news.content')"

        newsletter-title="Newsletter"
        newsletter-subtitle="Get the latest sustainability news weekly."
        newsletter-placeholder="Your email"
        newsletter-button-text="Subscribe"
    />
@endsection


@section('sidebar')
    <x-sidebar-news />
@endsection