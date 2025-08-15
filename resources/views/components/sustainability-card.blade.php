@props([
    'image' => 'images/background_aerophone.png',
    'title' => 'Judul Card',
    'subtitle1' => 'Subjudul pertama',
    'desc1' => 'Deskripsi pertama card. Bisa dua baris pendek.',
    'subtitle2' => 'Subjudul kedua',
    'desc2' => 'Deskripsi kedua card. Bisa dua baris pendek.',
    'rounded' => 'rounded-[28px]',
    'aspect' => 'aspect-[3/4]', 
    'scale' => 'scale-100', 
])

<div class="shadow-md {{ $rounded }} w-full sm:w-[32%] relative mb-6 sm:mb-0 mx-1">
  <!-- Area gambar -->
  <div class="w-full {{ $aspect }} {{ $rounded }} overflow-hidden">
    <img src="{{ asset($image) }}" alt="{{ $title }}"
         class="w-full h-full object-cover {{ $scale }} transition-transform duration-300">
  </div>

  <!-- Overlay teks -->
  <div class="absolute bottom-0 w-full bg-white/80 backdrop-blur-md rounded-b-[28px] shadow-lg p-3 sm:p-4">
    <div class="flex flex-col gap-1">
      <!-- Title -->
      <h3 class="text-base sm:text-lg font-bold text-gray-800 leading-tight">
        {{ $title }}
      </h3>

      <!-- Subtitle 1 + Deskripsi 1 -->
      <div>
        <h4 class="text-gray-700 text-sm sm:text-base font-semibold leading-snug">
          {{ $subtitle1 }}
        </h4>
        <p class="text-gray-600 text-xs sm:text-sm leading-snug">
          {{ $desc1 }}
        </p>
      </div>

      <!-- Subtitle 2 + Deskripsi 2 -->
      <div>
        <h4 class="text-gray-700 text-sm sm:text-base font-semibold leading-snug">
          {{ $subtitle2 }}
        </h4>
        <p class="text-gray-600 text-xs sm:text-sm leading-snug">
          {{ $desc2 }}
        </p>
      </div>
    </div>
  </div>
</div>
