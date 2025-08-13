{{-- Section --}}
<section class="min-h-screen bg-white px-4 sm:px-6 py-12 sm:py-16 flex flex-col items-center">
  <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-[#1C4F2B] mb-12 sm:mb-16 md:mb-20">
    Innovation for the Environment
  </h2>

  <!-- Scrollable Cards -->
  <div class="w-full max-w-7xl overflow-x-auto scrollbar-hide">
    <div class="flex gap-6 px-1">
      @foreach ([
        ['images/card1.png', 'Carbon Neutral Expansion', 'We’ve expanded our lineup of carbon-neutral products to include Aeraphone one series.'],
        ['images/card2.png', '60% Emissions Reduction', 'Over 60% reduction in CO₂e emissions across our carbon footprint since 2015.'],
        ['images/card3.png', '21.8M Tons of CO₂e Avoided', '21.8 million metric tons of CO₂e emissions avoided through our Supplier Clean Energy Program in 2024.'],
        ['images/card3.png', 'Sustainable Materials', '24 of materials shipped in our products came from recycled or renewable sources in 2024.'],
        ['images/card3.png', 'Product Reuse & Circularity', '5.9 million devices and accessories were sent to new owners for reuse in 2024.'],
        ['images/card3.png', 'Lower-Carbon Shipping', '50% or more of carbon-neutral Onephone products will be shipped using lower-carbon methods like ocean freight.'],
      ] as [$img, $title, $desc])
        <div class="flex-shrink-0 w-[85%] sm:w-[45%] lg:w-[30%]">
          <x-environment-card
            :image="$img"
            :title="$title"
            :description="$desc"
          />
        </div>
      @endforeach
    </div>
  </div>
</section>

<style>
.scrollbar-hide::-webkit-scrollbar { display: none; }
.scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>
