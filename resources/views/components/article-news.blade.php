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
    $newsletterBorder    = $newsletterBorder    ?? 'border-gray-100';
    $newsletterButton    = $newsletterButton    ?? 'bg-gray-400';
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
<div class="mt-6 border-t border-gray-100 pt-6 mb-12">
    <h3 class="text-sm font-medium mb-3 {{ $shareTitleColor }}">{{ __('Share this news') }}</h3>
    <div class="flex gap-3 flex-wrap">

        {{-- Facebook --}}
        <a
           class="p-2 rounded-full bg-gray-300 pointer-events-none cursor-default"
           aria-label="Share on Facebook">
            <x-icon.facebook class="w-4 h-4 text-white opacity-60" />
        </a>

        {{-- X (Twitter) --}}
        <a
           class="p-2 rounded-full bg-gray-300 pointer-events-none cursor-default"
           aria-label="Share on X (Twitter)">
            <x-icon.twitter class="w-4 h-4 text-white opacity-60" />
        </a>

        {{-- WhatsApp --}}
        <a
           class="p-2 rounded-full bg-gray-300 pointer-events-none cursor-default"
           aria-label="Share on WhatsApp">
            <x-icon.whatsapp class="w-4 h-4 text-white opacity-60" />
        </a>

        {{-- Instagram --}}
        <a
           class="p-2 rounded-full bg-gray-300 pointer-events-none cursor-default"
           aria-label="Visit Instagram">
            <x-icon.instagram class="w-4 h-4 text-white opacity-60" />
        </a>
    </div>
</div>

