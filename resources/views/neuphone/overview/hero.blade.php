<section class="relative isolate min-h-screen overflow-hidden bg-white">
  <!-- Background -->
  <div class="absolute inset-0 z-0">
    <div class="w-full h-full bg-no-repeat bg-cover bg-[60%_center] md:bg-center"
        style="background-image:url('{{ asset('images/neu_bg.png') }}')">
    </div>
  </div>

  <!-- Hero Content -->
  <div class="relative z-10 flex flex-col justify-center items-start md:items-start min-h-[calc(100vh-80px)] px-6 sm:px-10 md:px-20 text-left md:text-left">
    
    <h1 class="whitespace-pre-line text-5xl sm:text-5xl md:text-6xl lg:text-8xl font-bold text-white leading-snug sm:leading-snug md:leading-[1.2] tracking-wide mb-6 drop-shadow">
      The Edge of <br>Innovation <br>Smartphone
    </h1>
    
    <button
      class="bg-blue-600 text-white px-5 sm:px-6 md:px-8 py-1 sm:py-2 rounded-full text-xl sm:text-xl md:text-2xl font-semibold shadow hover:bg-blue-700 transition duration-300">
      {{ __("For You") }}
    </button> 
  </div>
</section>
