@props([
    'image' => 'images/background_aerophone.png',
    'title' => 'Judul Card',
    'description' => 'Deskripsi singkat card. Bisa dua baris pendek.',
    'rounded' => 'rounded-[28px]',
    'aspect' => 'aspect-[3/4]', 
    'scale' => 'scale-100', 
])

<div class="shadow-md {{ $rounded }} w-full relative mb-12 sm:mb-16">
  <!-- Area gambar -->
  <div class="w-full {{ $aspect }} {{ $rounded }} overflow-hidden">
    <img src="{{ asset($image) }}" alt="{{ $title }}"
         class="w-full h-full object-cover {{ $scale }} transition-transform duration-300">
  </div>

  <!-- Overlay teks -->
  <div class="absolute bottom-0 w-full bg-white/80 backdrop-blur-md rounded-b-[28px] shadow-lg h-[100px] sm:h-[140px]">
    <div class="px-3 sm:px-4 py-2 sm:py-3 h-full flex flex-col justify-start gap-1.5">
      <h3 class="text-base sm:text-lg font-bold text-gray-800 leading-tight">
        {{ $title }}
      </h3>
      <p class="text-gray-600 text-xs sm:text-sm leading-snug">
        {{ $description }}
      </p>
    </div>
  </div>
</div>
