<section class="relative isolate min-h-screen overflow-hidden bg-white">
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg_zenqophone.png') }}')"></div>
    </div>

    <!-- Wrapper -->
    <div class="relative z-10 min-h-screen flex items-center justify-center">
        <!-- Kontainer untuk gambar dan teks -->
        <div class="relative w-full max-w-[1000px] min-h-screen">
            <!-- Gambar Phone mepet bawah -->
            <img src="{{ asset('images/zenqophone_mockup.png') }}"
                alt="Zenqophone Mockup"
                class="absolute bottom-0 left-1/2 -translate-x-1/2 w-full h-auto mx-auto drop-shadow-lg z-0" />

            <!-- Teks di atas gambar -->
            <div class="absolute inset-0 flex flex-col items-center justify-end gap-9 pb-[10%] text-center text-white z-10">
                <h1 class="text-4xl md:text-5xl lg:text-[85px] font-bold drop-shadow font-barlow">The Future of Smart</h1>
                <h2 class="text-2xl md:text-3xl lg:text-[85px] font-bold text-[#779580] bg-white bg-opacity-100 px-4 py-7 rounded-3xl inline-block drop-shadow font-barlow">
                    Sustainable Phone
                </h2>
                <p class="text-xl md:text-2xl lg:text-[85px] font-bold drop-shadow font-barlow">Zenophone 4</p>
            </div>
        </div>
    </div>
    
</section>
