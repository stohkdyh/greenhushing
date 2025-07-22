@props([
    'image' => 'images/background_aerophone.png',
    'title' => 'Judul Card',
    'description' => 'Deskripsi singkat card. Bisa dua baris pendek.',
    'width' => 'w-[300px]',
    'height' => 'h-[460px]',
    'rounded' => 'rounded-[28px]',
    'overlayHeight' => 'h-[130px]',
])

<div class="shadow-md rounded-[28px]">
  <div class="relative {{ $width }} {{ $height }} {{ $rounded }} overflow-hidden">
    <!-- Gambar -->
    <img src="{{ asset($image) }}" alt="Gambar"
         class="w-full h-full object-cover {{ $rounded }}">

    <!-- Frame overlay bawah -->
    <div class="absolute bottom-0 left-0 w-full {{ $overlayHeight }} bg-white/90 backdrop-blur-md
                rounded-b-[28px] px-4 py-3 flex flex-col justify-center">
      <h3 class="text-lg font-bold text-gray-800">{{ $title }}</h3>
      <p class="text-gray-600 text-sm mt-1 leading-snug">
        {{ $description }}
      </p>
    </div>
  </div>
</div>

