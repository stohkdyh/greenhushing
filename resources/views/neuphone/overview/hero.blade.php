<section class="relative isolate min-h-screen overflow-hidden bg-white">
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full bg-cover bg-center bg-no-repeat"
             style="background-image:url('{{ asset('images/neu_bg.png') }}')">
        </div>
        {{-- <div class="absolute inset-x-0 bottom-0 h-12 pointer-events-none"
            style="background:linear-gradient(to bottom,rgba(255,255,255,0) 0%,#ffffff 80%);">
        </div> --}}

    </div>

    <!-- Hero Section -->
    <div class="relative z-10 flex flex-col justify-center items-start min-h-[calc(100vh-80px)] px-4 md:px-20 text-center md:text-left">
        <h1 class="whitespace-pre-line text-4xl sm:text-6xl md:text-7xl font-bold text-white leading-loose tracking-wide mb-6 drop-shadow">
            The Edge of<br>Innovation<br>Smartphone
        </h1>
        <button
            class="bg-blue-600 text-white px-6 py-3 rounded-full text-lg sm:text-xl font-semibold shadow hover:bg-blue-700 transition duration-300">
            {{ __("For You") }}
        </button> 
    </div>

    

    
</section>
