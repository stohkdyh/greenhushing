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

<div class="group shadow-md {{ $rounded }} 
            w-full sm:w-full md:w-full lg:w-[30%] 
            relative mb-6 mx-1 overflow-hidden">

  <!-- FLEX WRAPPER -->
  <div class="flex flex-col md:flex-row lg:flex-col {{ $rounded }} overflow-hidden h-full relative">

    <!-- GAMBAR -->
    <div class="w-full md:w-1/2 lg:w-full relative overflow-hidden {{ $aspect }} md:aspect-auto">
      <img src="{{ asset($image) }}" alt="{{ $title }}"
           class="w-full h-full object-cover {{ $scale }} transition-transform duration-500 group-hover:scale-110">
    </div>

    <!-- TEKS -->
    <div class="
        bg-white/90 backdrop-blur-md 
        shadow-lg p-4 sm:p-5 md:p-6 flex flex-col justify-center
        transition-all duration-500 ease-in-out
        
        <!-- default (mobile & sm): absolute overlay -->
        absolute bottom-0 w-full
        
        <!-- md: tampil normal -->
        md:static md:translate-y-0 md:opacity-100 md:w-1/2 md:shadow-none md:bg-white md:backdrop-blur-0 
        
        <!-- lg: balik lagi ke overlay -->
        lg:absolute lg:bottom-0 lg:w-full
    ">
      <div class="flex flex-col gap-3 sm:gap-4 md:gap-5">
        <!-- Title -->
        <h3 class="text-base sm:text-lg md:text-xl font-bold text-gray leading-snug">
          {{ $title }}
        </h3>

        <div class="space-y-2 sm:space-y-3 md:space-y-4">
          <h4 class="text-gray-900 text-sm sm:text-base font-semibold leading-snug">
            {{ $subtitle1 }}
          </h4>
          <p class="text-gray-800 text-xs sm:text-sm md:text-base leading-snug">
            {{ $desc1 }}
          </p>
        </div>

        <div class="space-y-2 sm:space-y-3 md:space-y-4">
          <h4 class="text-gray-900 text-sm sm:text-base font-semibold leading-snug">
            {{ $subtitle2 }}
          </h4>
          <p class="text-gray-800 text-xs sm:text-sm md:text-base leading-snug">
            {{ $desc2 }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
