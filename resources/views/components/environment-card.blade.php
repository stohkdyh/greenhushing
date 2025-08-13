{{-- Component --}}
@props([
    'image' => 'images/background_aerophone.png',
    'title' => 'Judul Card',
    'description' => 'Deskripsi singkat card. Bisa dua baris pendek.',
    'rounded' => 'rounded-[28px]',
])

<div class="shadow-md {{ $rounded }} w-full">
  <div class="relative w-full aspect-[3/4] {{ $rounded }} overflow-hidden">
    <img src="{{ asset($image) }}" alt="{{ $title }}"
         class="w-full h-full object-cover {{ $rounded }}">

    <div class="absolute bottom-0 left-0 w-full bg-white/90 backdrop-blur-md
                rounded-b-[28px] px-4 py-3 flex flex-col justify-center">
      <h3 class="text-lg font-bold text-gray-800">{{ $title }}</h3>
      <p class="text-gray-600 text-sm mt-1 leading-snug">
        {{ $description }}
      </p>
    </div>
  </div>
</div>
