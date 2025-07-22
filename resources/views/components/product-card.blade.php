{{-- resources/views/components/product-card.blade.php --}}
@props([
    /* — Konten — */
    'image'        => 'images/aera-box.png',
    'title'        => 'Onephone One',
    'rating'       => 4.5,
    'headlineTop'  => 'Circular by Design',
    'headlineBot'  => 'Sustainable by Purpose',
    'badge'        => 'Made for You',
    'price'        => 252,

    /* — Warna — */
    'bg'           => '#EEF5E8',
    'shadow'       => 'inset 0 6px 18px rgba(0,0,0,0.08)',
    'badgeBg'      => '#cde4b1',
    'badgeText'    => '#1C4F2B',
    'btnBg'        => '#1C4F2B',
    'btnHover'     => '#183f22',
    'btnText'      => 'white',
])

@php
    $full  = floor($rating);
    $half  = $rating - $full >= 0.5;
@endphp

<div class="min-h-screen bg-white flex items-center justify-center px-6 py-12">
  <div class="rounded-3xl p-6 sm:p-10 lg:p-14 flex flex-col md:flex-row items-center gap-10
              max-w-[90rem] w-full min-h-[40rem] lg:min-h-[42rem]"
       style="background-color: {{ $bg }}; box-shadow: {{ $shadow }};">

    {{-- Gambar --}}
    <div class="w-full md:w-2/5 flex justify-center md:justify-end">
      <img src="{{ asset($image) }}" alt="{{ __($title) }} Box"
           class="w-[180px] sm:w-[180px] md:w-[320px] lg:w-[400px] xl:w-[450px] transition-transform duration-300 hover:scale-105">
    </div>

    {{-- Info --}}
    <div class="w-full md:w-3/5 max-w-3xl text-center md:text-left space-y-7">
      {{-- Judul & Rating --}}
      <div class="space-y-1">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 tracking-tight">
          {{ __($title) }}
        </h2>
        <div class="flex justify-center md:justify-start gap-1 text-yellow-400 text-xl sm:text-2xl">
          @for ($i = 0; $i < $full; $i++) <span>★</span> @endfor
          @if ($half) <span class="text-yellow-200">★</span> @endif
        </div>
      </div>

      {{-- Slogan --}}
      <h1 class="text-4xl sm:text-5xl lg:text-7xl leading-[1.3] text-gray-900 tracking-tight">
        <span class="block">{{ __($headlineTop) }}</span>
        <span class="block">{{ __($headlineBot) }}</span>
      </h1>

      {{-- Badge --}}
      <span class="inline-block font-semibold py-1.5 px-5 text-base sm:text-lg md:text-xl rounded-lg tracking-wide"
            style="background-color: {{ $badgeBg }}; color: {{ $badgeText }};">
        {{ __($badge) }}
      </span>

      {{-- Price --}}
      <p class="flex items-baseline justify-center md:justify-start gap-1 text-gray-700 text-lg sm:text-xl md:text-2xl">
        <span class="text-sm sm:text-base">{{ __('From') }}</span>
        <span class="relative -top-2 text-xs sm:text-sm">$</span>
        <span class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $price }}</span>
      </p>

      {{-- CTA --}}
      <a href="#"
         class="inline-block font-medium text-sm sm:text-base md:text-lg py-3 px-6 rounded-lg transition"
         style="background-color: {{ $btnBg }}; color: {{ $btnText }};"
         onmouseover="this.style.backgroundColor='{{ $btnHover }}'"
         onmouseout="this.style.backgroundColor='{{ $btnBg }}'">
        {{ __('Buy Now') }}
      </a>
    </div>
  </div>
</div>
