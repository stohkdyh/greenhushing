<section class="relative isolate min-h-screen overflow-hidden bg-white">
    <!-- Background -->
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full bg-cover bg-center bg-no-repeat"
             style="background-image: url('{{ asset('images/bg_zenqophone.png') }}')"></div>
    </div>

    <!-- Wrapper -->
    <div class="relative z-10 min-h-screen flex items-center justify-center">
        <div class="relative w-[90%] sm:w-[85%] md:w-[800px] lg:w-[1000px] min-h-screen mx-auto">
            
            <!-- Gambar Phone -->
            <img src="{{ asset('images/zenqo_mockup.png') }}"
                alt="Zenqophone Mockup"
                class="absolute 
                       top-[500px] sm:top-[380px] md:top-[320px] lg:top-[220px]
                       left-1/2 -translate-x-1/2 
                       w-[115%] sm:w-[110%] md:w-[100%] lg:w-[95%]
                       scale-100 sm:scale-[1.1] md:scale-[1.2] lg:scale-[1.25]
                       h-auto drop-shadow-lg z-0" />

            <!-- Teks -->
            <div class="absolute inset-0 flex flex-col items-center justify-end 
                        gap-4 sm:gap-6 md:gap-8 lg:gap-10 pb-[6%] lg:pb-[3%] text-center text-white z-10">
                
                <h1 class="text-2xl sm:text-5xl md:text-6xl lg:text-[64px] xl:text-[80px] font-bold drop-shadow font-barlow">
                    The Future of Smart
                </h1>
                
                <h2 class="text-xl sm:text-4xl md:text-5xl lg:text-[64px] xl:text-[80px] font-bold 
                        text-[#779580] bg-white 
                        px-3 sm:px-4 md:px-5 lg:px-6 py-2 sm:py-2 md:py-4 lg:py-5 
                        rounded-xl inline-block drop-shadow font-barlow">
                    Sustainable Phone
                </h2>
                
                <p class="text-xl sm:text-4xl md:text-5xl lg:text-[64px] xl:text-[80px] font-bold drop-shadow font-barlow">
                    Zenophone 4
                </p>
            </div>
        </div>
    </div>
</section>
