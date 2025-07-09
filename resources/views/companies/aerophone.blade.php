<x-company-layout logo="AERAPHONE">
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/background.jpg') }}')"></div>
    </div>

    <div class="relative z-10">
        <div x-data="textSequence()" x-init="observe()" class="relative min-h-[60vh] text-white" x-ref="trigger">
            <!-- One Phone -->
            <div 
                class="absolute left-[5%] text-4xl md:text-6xl lg:text-8xl font-bold text-one-phone"
                x-show="showPhone"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-8"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-cloak
            >
                One Phone
            </div>

            <!-- One Planet -->
            <div 
                class="absolute left-1/2 transform -translate-x-1/2 text-4xl md:text-6xl lg:text-8xl font-bold text-one-planet"
                x-show="showPlanet"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-8"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-cloak
            >
                One Planet
            </div>

            <!-- Make it Count -->
            <div 
                class="absolute right-[5%] text-4xl md:text-6xl lg:text-8xl font-bold text-right text-make-it-count"
                x-show="showCount"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-8"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-cloak
            >
                Make it Count
            </div>
        </div>
    </div>

    {{-- Inject script & style langsung di bawah slot --}}
    @push('scripts')
    <script>
      function textSequence() {
        return {
          showPhone: false,
          showPlanet: false,
          showCount: false,
          observe() {
            const observer = new IntersectionObserver((entries) => {
              if (entries[0].isIntersecting) {
                this.revealTexts();
                observer.disconnect(); 
              }
            }, {
              threshold: 0.5,
            });

            observer.observe(this.$refs.trigger);
          },
          revealTexts() {
            setTimeout(() => this.showPhone = true, 200);
            setTimeout(() => this.showPlanet = true, 1200);
            setTimeout(() => this.showCount = true, 2200);
          }
        }
      }
    </script>
    @endpush

    @push('styles')
    <style>
      .text-one-phone {
        top: 80%;
      }
      .text-one-planet {
        top: 87%;
      }
      .text-make-it-count {
        top: 94%;
      }

      @media (min-width: 768px) {
        .text-one-phone { top: 80%; }
        .text-one-planet { top: 90%; }
        .text-make-it-count { top: 100%; }
      }

      @media (min-width: 1024px) {
        .text-one-phone { top: 75%; }
        .text-one-planet { top: 90%; }
        .text-make-it-count { top: 110%; }
      }
    </style>
    @endpush
</x-company-layout>
