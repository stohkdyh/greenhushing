{{-- resources/views/components/product-card.blade.php --}}
@props([
    'imageleft'     => 'images/left_phone.png',
    'imageright'    => 'images/right_phone.png',
    'title'         => 'Onephone One',
    'headline'      => 'Sustainable smartphone for everyone.',
    'description'   => 'Crafted with recycled materials and optimized for longevity, Onephone One is your smart choice.',
    
    'bg'            => '#EEF5E8',
    'shadow'        => 'inset 0 6px 18px rgba(0,0,0,0.08)',
    'titleColor'    => '#1C4F2B',
    'textColor'     => '#333',
    'btnBg'        => '#1C4F2B',
    'btnHover'     => '#183f22',
    'btnText'      => 'white',
])

<div class="relative min-h-screen flex items-center justify-center px-6 py-4 bg-white">
  <div class="relative rounded-3xl text-center max-w-6xl w-full overflow-hidden"
       style="background-color: {{ $bg }}; box-shadow: {{ $shadow }};">

    {{-- Phone Images Inside Background --}}
    <div class="absolute w-[220px] -bottom-6 -left-2 sm:w-56 md:w-72 lg:w-72 xl:w-96 opacity-90">
      <img src="{{ asset($imageleft) }}" alt="Phone Left" class="object-contain w-full">
    </div>
    <div class="absolute bottom-0 right-0 w-[180px] sm:w-56 md:w-64 lg:w-80 xl:w-340 opacity-90">
      <img src="{{ asset($imageright) }}" alt="Phone Right" class="object-contain w-full">
    </div>

    <div class="px-6 pt-10 pb-40">
        {{-- Title --}}
        <h1 class="text-4xl sm:text-5xl font-bold mb-8 relative z-10" style="color: {{ $titleColor }}">
        {{ __($title) }}
        </h1>

        {{-- Headline Sentence --}}
        <p class="text-lg sm:text-xl mb-2 relative z-10" style="color: {{ $textColor }}">
        {{ __($headline) }}
        </p>

        {{-- Dashed Line --}}
        <div class="border-t border-dashed border-gray-400 w-2/3 mx-auto mb-2 relative z-10"></div>

        {{-- Description --}}
        <p class="text-base sm:text-lg max-w-3xl mx-auto mb-4 relative z-10" style="color: {{ $textColor }}">
        {{ __($description) }}
        </p>

        <a href="#"
         class="inline-block font-medium text-sm sm:text-base md:text-sm py-3 px-6 rounded-lg transition"
         style="background-color: {{ $btnBg }}; color: {{ $btnText }};"
         onmouseover="this.style.backgroundColor='{{ $btnHover }}'"
         onmouseout="this.style.backgroundColor='{{ $btnBg }}'">
        {{ __('Check your phone value') }}
        </a>
    </div>
  </div>
</div>
