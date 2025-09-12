@props([
    'image' => 'images/background_aerophone.png',
    'title' => 'Judul Card',
    'description' => 'Deskripsi singkat card. Bisa dua baris pendek.',
    'rounded' => 'rounded-[28px]',
    'aspect' => 'aspect-[3/4]', 
    'scale' => 'scale-100',
    'show' => true, 
])

<div class="shadow-md {{ $rounded }} w-full relative mb-12 sm:mb-16 flex flex-col">

  <!-- Area gambar -->
  <div class="w-full {{ $aspect }} {{ $rounded }} overflow-hidden relative">
    <img src="{{ asset($image) }}" alt="{{ $title }}"
         class="w-full h-full object-cover {{ $scale }} transition-transform duration-300">

    @if($show)
        <!-- Assurance (posisi fleksibel di atas overlay) -->
        <div class="absolute bottom-[calc(100px+10px)] sm:bottom-[calc(140px+10px)] left-2
                    bg-white/60 backdrop-blur-sm 
                    text-gray-700 text-xxs sm:text-xs font-semibold 
                    rounded-md shadow 
                    flex items-center overflow-hidden">

            {{-- Icon --}}
            <div class="ml-1 px-1 py-1 flex-shrink-0">
                @include('components.icon.check')
            </div>

            {{-- Teks muncul dengan animasi --}}
            <span class="mr-2 text-[#1C4F2B] opacity-0 animate-fade-in">
                {{__('Assurance by Independent Third Parties') }}
            </span>
        </div>
    @endif
  </div>

  <!-- Overlay teks -->
  <div class="absolute bottom-0 w-full bg-white/80 backdrop-blur-md {{ $rounded }} rounded-t-none shadow-lg h-[100px] sm:h-[140px]">
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


<style>
@keyframes expandWidth {
  0% { max-width: 24px; }   /* awal: cuma muat icon */
  100% { max-width: 160px; } /* akhir: muat teks */
}

/* Keyframe fade teks */
@keyframes fadeInText {
  0% { opacity: 0; transform: translateX(4px); }
  100% { opacity: 1; transform: translateX(0); }
}

/* Terapkan ke container background */
.absolute.bottom-36.left-1 {
  animation: expandWidth 0.6s ease forwards;
  animation-delay: 0.3s; /* delay sebelum expand */
  max-width: 24px;       /* ukuran awal */
}

/* Terapkan ke teks */
.animate-fade-in {
  animation: fadeInText 0.4s ease forwards;
  animation-delay: 0.6s; /* muncul setelah background expand */
}
</style>
