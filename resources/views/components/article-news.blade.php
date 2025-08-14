@php
    $author              = $author              ?? 'Martha Stewart';
    $source              = $source              ?? 'The Eco Ledger';
    $title               = $title               ?? 'OneTech Sets a New Standard for Sustainable Smartphones';
    $image               = $image               ?? asset('images/bg_zenqophone.png');
    $imageAlt            = $imageAlt            ?? 'Neuveraphone Green Strategy';
    $imageCaption        = $imageCaption        ?? 'OneTech’s new modular smartphone promotes repairability and eco-friendly materials.';
    $content             = $content             ?? '';

    $articleTitleColor   = $articleTitleColor   ?? 'text-gray-900';
    $shareTitleColor     = $shareTitleColor     ?? 'text-gray-600';
    
    $shareButtons        = $shareButtons        ?? []; // Array tombol share

    $newsletterTitle     = $newsletterTitle     ?? 'Newsletter';
    $newsletterSubtitle  = $newsletterSubtitle  ?? 'Get the latest sustainability news weekly.';
    $newsletterPlaceholder = $newsletterPlaceholder ?? 'Your email';
    $newsletterButtonText  = $newsletterButtonText  ?? 'Subscribe';

    $newsletterBg        = $newsletterBg        ?? 'bg-white';
    $newsletterBorder    = $newsletterBorder    ?? 'border-green-100';
    $newsletterButton    = $newsletterButton    ?? 'bg-green-600 hover:bg-green-700';
@endphp


<article class="space-y-6">
    <div>
        <!-- Penulis -->
        <div class="flex flex-wrap items-center gap-3 text-gray-500 text-sm">
            <span>{{ $author ?? 'Martha Stewart' }}</span>
            <span>|</span>
            <span>{{ $source ?? 'The Eco Ledger' }}</span>
        </div>

        <!-- Judul -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold !leading-snug {{ $articleTitleColor }}">
            {{ $title ?? 'OneTech Sets a New Standard for Sustainable Smartphones' }}
        </h1>
    </div>

    <!-- Gambar Utama -->
    <figure>
        <img 
            src="{{ $image ?? asset('images/bg_zenqophone.png') }}" 
            alt="{{ $imageAlt ?? 'Neuveraphone Green Strategy' }}" 
            class="w-full h-auto rounded-xl shadow-lg object-cover"
        >
        <figcaption class="mt-2 text-xs text-gray-500">
            {{ $imageCaption ?? 'OneTech’s new modular smartphone promotes repairability and eco-friendly materials.' }}
        </figcaption>
    </figure>

    <!-- Isi Berita -->
    <div class="prose prose-base sm:prose-lg max-w-none text-gray-800 space-y-3 text-justify">
        {!! $content ?? '' !!}
    </div>
</article>

<!-- Share Section -->
<div class="mt-6 border-t border-gray-100 pt-6">
    <h3 class="text-sm font-medium mb-3 {{ $shareTitleColor }}">{{ __('Share this news') }}</h3>
    <div class="flex gap-3 flex-wrap">
        {{-- Facebook --}}
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
           target="_blank"
           class="p-2 rounded-full bg-blue-600 hover:bg-blue-700 transition-colors"
           aria-label="Share on Facebook">
            <x-icon.facebook class="w-4 h-4 text-white" />
        </a>

        {{-- X (Twitter) --}}
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}"
           target="_blank"
           class="p-2 rounded-full bg-black hover:bg-gray-800 transition-colors"
           aria-label="Share on X (Twitter)">
            <x-icon.twitter class="w-4 h-4 text-white" />
        </a>

        {{-- WhatsApp --}}
        <a href="https://api.whatsapp.com/send?text={{ urlencode(request()->fullUrl()) }}"
           target="_blank"
           class="p-2 rounded-full bg-green-500 hover:bg-green-600 transition-colors"
           aria-label="Share on WhatsApp">
            <x-icon.whatsapp class="w-4 h-4 text-white" />
        </a>

        {{-- Instagram (profil link) --}}
        <a href="https://www.instagram.com/"
           target="_blank"
           class="p-2 rounded-full bg-pink-500 hover:bg-pink-600 transition-colors"
           aria-label="Visit Instagram">
            <x-icon.instagram class="w-4 h-4 text-white" />
        </a>
    </div>
</div>



<!-- Newsletter -->
<div class="mt-12 border-t border-gray-200 pt-8 pb-20">
    <h2 class="text-base font-semibold text-gray-800 mb-2">{{ $newsletterTitle ?? 'Newsletter' }}</h2>
    <p class="text-sm text-gray-500 mb-4">{{ $newsletterSubtitle ?? 'Get the latest sustainability news weekly.' }}</p>
    
    <form class="flex flex-col sm:flex-row overflow-hidden rounded-xl shadow-sm border {{ $newsletterBorder }} {{ $newsletterBg }}">
        <input 
            type="email" 
            placeholder="{{ $newsletterPlaceholder ?? 'Your email' }}"
            class="flex-1 px-4 py-3 text-sm border-0 focus:outline-none focus:ring-2 focus:ring-green-500 bg-white placeholder-gray-400"
        >
        <button 
            class="px-5 py-3 text-sm font-medium w-full sm:w-auto text-white transition-colors {{ $newsletterButton }}"
        >
            {{ $newsletterButtonText ?? 'Subscribe' }}
        </button>
    </form>
</div>
