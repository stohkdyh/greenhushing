@extends('layouts.news-layout')

@section('title', 'OnePhone News')

@section('content')
    <x-article-news 
        author="Martha Stewart"
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



{{-- <article class="space-y-6">

    <div class="space-y-0">
        <!-- Penulis -->
        <div class="flex flex-wrap items-center gap-3 text-gray-500 text-sm">
            <span></span>
            <span>|</span>
            <span></span>
        </div>

        <!-- Judul -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 !leading-snug">
            
        </h1>
    </div>

    <!-- Gambar Utama -->
    <figure class="w-full">
        <img src="{{ asset('') }}" 
            alt="Neuveraphone Green Strategy" 
            class="w-full max-w-full h-auto rounded-xl shadow-lg object-cover">
        <figcaption class="mt-2 text-xs text-gray-500">
            
        </figcaption>
    </figure>

    <!-- Isi Berita -->
    <div class="prose prose-base sm:prose-lg max-w-none text-gray-800 space-y-3 text-justify">
        {{-- Semua paragraf & list dibiarkan sama persis --}}
        {{-- 
    </div>
</article>

<!-- Share Section -->
<div class="mt-6 border-t border-gray-100 pt-6">
    <h3 class="text-sm font-medium text-gray-600 mb-3">Share this article</h3>
    <div class="flex gap-3 flex-wrap">
        <a href="#" class="p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"></svg>
        </a>
        <a href="#" class="p-2 bg-sky-400 text-white rounded-full hover:bg-sky-500 transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"></svg>
        </a>
        <a href="#" class="p-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"></svg>
        </a>
    </div>
</div>

<!-- Newsletter -->
<div class="mt-12 border-t border-gray-200 pt-8 pb-20">
    <h2 class="text-base font-semibold text-gray-800 mb-2">Newsletter</h2>
    <p class="text-sm text-gray-500 mb-4">Get the latest sustainability news weekly.</p>
    
    <form class="flex flex-col sm:flex-row overflow-hidden rounded-xl shadow-sm border border-green-100 bg-white">
        <input 
            type="email" 
            placeholder="Your email"
            class="flex-1 px-4 py-3 text-sm border-0 focus:outline-none focus:ring-2 focus:ring-green-500 bg-white placeholder-gray-400"
        >
        <button 
            class="bg-green-600 text-white px-5 py-3 hover:bg-green-700 transition-colors text-sm font-medium w-full sm:w-auto"
        >
            Subscribe
        </button>
    </form>
</div> --}} 
