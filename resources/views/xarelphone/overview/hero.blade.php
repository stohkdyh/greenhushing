<section class="relative isolate min-h-screen overflow-hidden bg-white">
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full bg-cover bg-center bg-no-repeat"
             style="background-image:url('{{ asset('images/xarelonphone_bg.png') }}')">
        </div>
        <div class="absolute inset-x-0 bottom-0 h-32 pointer-events-none"
             style="background:linear-gradient(to bottom,rgba(255,255,255,0) 0%,#ffffff 100%);">
        </div>
    </div>

    <!-- Hero Section -->
    <div class="relative z-10 flex flex-col justify-center items-start min-h-[calc(100vh-80px)] px-4 md:px-20 text-center md:text-left">
        <h1 class="whitespace-pre-line text-4xl sm:text-6xl md:text-7xl font-bold text-black leading-loose tracking-wide mb-6 drop-shadow">
            {{ __("Smart Just Got Smarter Powered Phone") }}
        </h1>
        <button
            class="bg-blue-600 text-white px-6 py-3 rounded-full text-lg sm:text-xl font-semibold shadow hover:bg-blue-700 transition duration-300">
            {{ __("Just For You") }}
        </button>
    </div>

    

    
</section>
