<section class="flex flex-col-reverse md:flex-row items-center px-6 md:px-20 py-16 bg-white gap-10">
    <!-- Kiri: Gambar dan card -->
    <div class="w-full md:w-1/2 flex justify-center md:justify-start relative fade-in-right">
        <div class="relative w-full max-w-[380px] min-h-[380px] sm:min-w-[400px] sm:min-h-[460px] mx-auto">
            <!-- Card latar -->
            <div class="rounded-3xl px-8 sm:px-12 py-8 sm:py-10 shadow-xl w-full h-full z-0 relative" style="background-color: #F2F9EC"></div>

            <!-- Gambar HP besar & center -->
            <img src="images/zeno_product3.png"
                alt="Product 3"
                class="absolute left-1/2 -translate-x-1/2 bottom-[-60px] sm:bottom-[-80px] 
                    w-[320px] sm:w-[380px] md:w-[400px] 
                    h-auto object-contain z-10 drop-shadow-2xl 
                    transition-transform duration-500 hover:scale-105" />
        </div>
    </div>

    <!-- Kanan: Teks -->
    <div class="flex flex-col gap-4 max-w-xl">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight text-center md:text-left">
            {!! __('Materials by<br>Sustainability,<br>Responsibly Sourced') !!}
        </h2>

        <p class="text-8xl font-extrabold text-[#1C4F2B] text-center md:text-left">100%</p>

        <p class="text-base sm:text-lg md:text-2xl text-gray-700 text-center md:text-left">
            {!! __('the use of sustainable<br>materials') !!}
        </p>

        <p class="relative inline-flex items-center gap-1 py-1 px-2
            text-sm font-semibold
            rounded-lg shadow-sm w-fit
            transition-all duration-300
            hover:scale-105 hover:shadow-md
            self-center md:self-start"
            style="color:#AACC8D;
                background-color:#AACC8D20;
                border:1px solid #AACC8D50;">
            
            <!-- ekor bubble -->
            <span class="absolute -left-2 top-1/2 -translate-y-1/2 
                        w-0 h-0 border-t-[6px] border-b-[6px] border-r-[8px] border-transparent"
                style="border-right-color:#AACC8D50;">
            </span>

            <!-- ikon -->
            <span class="text-current">
            @include('components.icon.leaf')
            </span>
            {{ __('Green Material') }}
        </p>
    </div>
</div>

</section>
