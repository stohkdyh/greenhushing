@props([
    'image'        => 'images/aera-box.png',
    'title'        => 'Onephone One',
    'rating'       => 4.5,
    'headlineTop'  => 'Circular by Design',
    'headlineBot'  => 'Sustainable by Purpose',
    'badge'        => 'Made for You',
    'price'        => 252,

    // Warna
    'bg'           => '#EEF5E8',
    'shadow'       => 'inset_0_6px_18px_rgba(0,0,0,0.08)',
    'badgeBg'      => '#cde4b1',
    'badgeText'    => '#1C4F2B',
    'btnBg'        => '#1C4F2B',
    'btnHover'     => '#183f22',
    'btnText'      => 'white',
])

@php
    // Hitung jumlah bintang penuh & setengah
    $full   = floor($rating);
    $half   = $rating - $full >= 0.5;
@endphp

<div class="min-h-screen bg-white flex items-center justify-center px-6 py-12">
  <div class="rounded-3xl p-6 sm:p-10 lg:p-14 flex flex-col md:flex-row items-center gap-10
              max-w-[90rem] w-full min-h-[40rem] lg:min-h-[42rem] xl:min-h-[42rem]"
       style="background-color: {{ $bg }}; box-shadow: {{ $shadow }};">

    {{-- Product Box --}}
    <div class="w-full md:w-2/5 flex justify-center md:justify-end">
      <img src="{{ asset($image) }}" alt="{{ $title }} Box"
           class="w-40 sm:w-52 md:w-60 lg:w-72 xl:w-80 transition-transform duration-300 hover:scale-105">
    </div>

    {{-- Product Info --}}
    <div class="w-full md:w-3/5 max-w-3xl text-center md:text-left space-y-7">
      <div class="space-y-1">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 tracking-tight">{{ $title }}</h2>
        <div class="flex justify-center md:justify-start gap-1 text-yellow-400 text-xl sm:text-2xl">
          @for ($i = 0; $i < floor($rating); $i++) <span>★</span> @endfor
          @if ($rating - floor($rating) >= 0.5)
            <span class="text-yellow-200">★</span>
          @endif
        </div>
      </div>

      <h1 class="text-4xl sm:text-5xl lg:text-7xl leading-[1.3] text-gray-900 tracking-tight">
        <span class="block">{{ $headlineTop }}</span>
        <span class="block">{{ $headlineBot }}</span>
      </h1>

      <span class="inline-block font-semibold py-1.5 px-5 text-base sm:text-lg md:text-xl rounded-lg tracking-wide"
            style="background-color: {{ $badgeBg }}; color: {{ $badgeText }};">
        {{ $badge }}
      </span>

      <p class="flex items-baseline justify-center md:justify-start gap-1 text-gray-700 text-lg sm:text-xl md:text-2xl">
        <span class="text-sm sm:text-base">From</span>
        <span class="relative -top-2 text-xs sm:text-sm">$</span>
        <span class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $price }}</span>
      </p>

      <a href="#"
         class="inline-block font-medium text-sm sm:text-base md:text-lg py-3 px-6 rounded-lg transition"
         style="background-color: {{ $btnBg }}; color: {{ $btnText }};"
         onmouseover="this.style.backgroundColor='{{ $btnHover }}'"
         onmouseout="this.style.backgroundColor='{{ $btnBg }}'">
        Buy Now
      </a>
    </div>
  </div>
</div>
