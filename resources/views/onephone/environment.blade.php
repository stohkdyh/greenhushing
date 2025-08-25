{{-- Section --}}
<section class="min-h-screen bg-white px-4 sm:px-6 py-10 sm:py-16 flex flex-col items-center">
  <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-[#1C4F2B] mb-10 sm:mb-16 md:mb-20">
    {{ __('Innovation for the Environment') }}
  </h2>

  <div class="relative w-full max-w-7xl mx-auto">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        @foreach ([
            ['images/onephone_card.png', __('Carbon Neutral Expansion'), __('We`ve expanded our lineup of carbon-neutral products to include Onephone one series.'), true],
            ['images/onephone_card1.png', __('60% Emissions Reduction'), __('Over 60% reduction in CO₂e emissions across our carbon footprint since 2015.'), true],
            ['images/onephone_card2.png', __('21.8M Tons of CO₂e Avoided'), __('21.8 million metric tons of CO₂e emissions avoided through our Supplier Clean Energy Program in 2024.'), true],
            ['images/onephone_card3.png', __('Sustainable Materials'), __('24% of materials shipped in our products came from recycled or renewable sources in 2024.'), 'scale-110', true],
            ['images/onephone_card4.png', __('Product Reuse & Circularity'), __('5.9 million devices and accessories were sent to new owners for reuse in 2024.'), 'scale-110', true],
            ['images/onephone_card5.png', __('Lower-Carbon Shipping'), __('50% or more of carbon-neutral Onephone products will be shipped using lower-carbon methods like ocean freight.'), 'scale-110', true],
        ] as $index => $card)
            @php
                $scale = in_array($index, [3,4,5]) ? 'scale-110' : 'scale-100'; 
            @endphp
            <div class="swiper-slide">
                <x-environment-card
                    :image="$card[0]"
                    :title="$card[1]"
                    :description="$card[2]"
                    :scale="$scale"
                    :show="$card[3]"
                />
            </div>
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>
    <!-- Navigation -->
    <div class="swiper-button-prev custom-swiper-btn"></div>
    <div class="swiper-button-next custom-swiper-btn"></div>
  </div>
</section>


@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<style>
  .custom-swiper-btn {
    background-color: #1C4F2B;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 50;
  }
  .custom-swiper-btn::after {
    font-size: 14px;
    color: white;
  }

  .swiper-pagination-bullet {
    background: #1C4F2B; 
    opacity: 0.5; 
  }

  .swiper-pagination-bullet-active {
    background: #1C4F2B;
    opacity: 1; 
  }

  .swiper-pagination-bullet {
    transition: background-color 0.3s, opacity 0.3s;
  }

  @media (min-width: 1024px) {
    .custom-swiper-btn {
      width: 44px;
      height: 44px;
    }
    .swiper-button-prev { left: -60px; }
    .swiper-button-next { right: -60px; }
  }

  /* Mobile: tombol dekat & kecil */
  @media (max-width: 1023px) {
    .swiper-button-prev { left: -10px; }
    .swiper-button-next { right: -10px; }
  }
</style>
@endpush


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1.1,
    spaceBetween: 12,
    centeredSlides: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      640: { slidesPerView: 2, spaceBetween: 16 },
      1024: { slidesPerView: 3, spaceBetween: 20 }
    }
  });
</script>
@endpush

