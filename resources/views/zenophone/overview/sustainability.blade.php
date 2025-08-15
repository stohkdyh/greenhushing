<section class="min-h-screen bg-white px-4 sm:px-6 py-10 sm:py-16 flex flex-col items-center">
  <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-[#1C4F2B] mb-10 sm:mb-16 md:mb-20">
    {{ __('Sustainability at the Core of How We Build') }}
  </h2>

  <div class="w-full max-w-9xl mx-auto flex flex-wrap justify-center gap-4">
    @foreach ([
        [
            'images/zeno_sustainability1.png',
            __('Updating Packaging with Less Plastic'),
            __('100% Biodegradable'),                
            __('The packaging for Zenphone’s Bluetooth earphone Neckband model has shifted from plastic to paper materials.'),
            __('Remove Unnecessary Plastic'),               
            __('Our latest AIoT packaging no longer uses plastic handles, reducing plastic usage by approximately 80g per box') 
        ],
        [
            'images/zeno_sustainability2.png',
            __('Greener Logistics Management'),
            __('Minimizing Transit Time'),
            __('We’ve established regional warehouses across the globe to shorten delivery distances and reduce emissions. In Indonesia, this strategy alone reduced shipping emissions by 71% annually.'),
            __('Reducing Air Freight'),
            __('In 2022, 2.32 million products were delivered by sea or rail instead of air, significantly lowering the carbon footprint of our logistics.')
        ],
        [
            'images/zeno_sustainability3.png',
            __('Innovating in Production Methods'),
            __('Streamlining Production Lines'),
            __('We’ve optimized AC production procedures and applied them across other product lines—saving 48,500 kWh per AC unit produced after the process improvement.'),
            __('Promoting Clean Energy'),
            __('Our suppliers improved carbon reduction efforts by up to 9.4%, including verified emissions reductions up to 7.9% compared to 2021.')
        ],
    ] as $index => $card)
        @php
            $scale = 'scale-100';
        @endphp
        <x-sustainability-card 
            :image="$card[0]"
            :title="$card[1]"
            :subtitle1="$card[2]"
            :desc1="$card[3]"
            :subtitle2="$card[4]"
            :desc2="$card[5]"
            :scale="$scale"
        />
    @endforeach
  </div>
</section>
