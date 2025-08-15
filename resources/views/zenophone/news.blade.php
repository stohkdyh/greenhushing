@extends('layouts.news-layout')

@section('title', 'Zenophone News')

@section('content')
    <x-article-news 
        author="{{ __('By Martha Stewart') }}"
        source="Global Gadget Times"
        title="{{__('Green on the Surface? ZenoTech Faces Scrutiny Over Misleading Eco Claims')}}"
        image="{{ asset('images/zenophone-bg.png') }}"
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