@extends('layouts.news-layout')

@section('title', 'Neuphone News')

@section('content')
    <x-article-news 
        author="{{ __('By Martha Stewart') }}"
        source="Global Gadget Times"
        title="{{ __('NeuPhone Impresses with Design and Performance — But Stays Quiet on Its Green Credentials') }}"
        image="{{ asset('images/bg_zenqophone.png') }}"
        image-alt="Recyclable smartphone product shot"
        image-caption="{{ __('OneTech’s new modular smartphone promotes repairability and eco-friendly materials.') }}"
        :content="view('neuphone.news.content')"

        newsletter-title="{{ __('Newsletter') }}"
        newsletter-subtitle="{{ __('Get the latest sustainability news weekly.') }}"
        newsletter-placeholder="{{ __('Your email') }}"
        newsletter-button-text="{{ __('Subscribe') }}"

    />
@endsection


@section('sidebar')
    <x-sidebar-news />
@endsection