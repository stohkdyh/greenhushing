<section class="relative overflow-hidden px-6 md:px-20 py-32 md:py-16 gap-12 md:gap-16 mt-24">
  <!-- Split Background -->
  <div class="absolute inset-0 z-0 flex">
    <div class="w-1/2 bg-white"></div>
    <div class="w-1/2 bg-[#F2F7F1]"></div>
  </div>

  <!-- Lingkaran kiri atas besar -->
  <div class="absolute -top-32 -left-32 w-[400px] h-[400px] bg-white rounded-full z-0"></div>

  <!-- Lingkaran kiri bawah -->
  <div class="absolute bottom-20 left-20 w-[450px] h-[450px] bg-[#F2F7F1] rounded-full z-0"></div>

  <!-- Lingkaran kanan atas -->
  <div class="absolute -top-32 right-20 w-[450px] h-[450px] bg-white rounded-full z-0"></div>

  <!-- Konten Utama -->
  <div class="relative z-10 flex flex-col md:flex-row items-center justify-center gap-10">

    <!-- Teks kiri atas -->
    <div class="absolute top-6 left-6 text-left max-w-[260px]">
      <p class="text-base sm:text-lg md:text-4xl text-gray-700 leading-snug">
        {!! __('Does not contain banned<br />chemical substance') !!}
      </p>
      <div class="relative inline-flex items-center gap-1 py-1 px-2
                  text-sm md:text-lg font-semibold
                  rounded-lg shadow-sm w-fit
                  transition-all duration-300
                  hover:scale-105 hover:shadow-md
                  self-start"
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
          @include('components.icon.archive') 
        </span>

        {{ __('Save Material') }}
      </div>
    </div>

    <!-- Gambar HP -->
    <div class="relative max-w-[700px] mx-auto z-10">
      <img src="images/zeno_product4.png" alt="product 4" class="w-full h-auto object-contain" />
    </div>

    <!-- Teks kanan bawah -->
    <div class="absolute bottom-[-60px] md:bottom-6 right-6 text-right max-w-[280px]">
      <p class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-black leading-snug">
        {!! __('Clean by Design –<br />free from harmful<br />substances') !!}
      </p>
    </div>
  </div>
</section>
