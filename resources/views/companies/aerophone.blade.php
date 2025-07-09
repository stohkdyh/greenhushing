<x-company-layout logo="AERAPHONE">
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/background_aerophone.png') }}')"></div>
    </div>

    <div class="
        absolute inset-x-0 z-10 overflow-hidden top-[15vh] sm:top-[15vh] md:top-[10vh] lg:top-[5vh]">
        <img src="{{ asset('images/handbackground_aerophone.png') }}"
            alt="Hand"
            class="
                w-full
                h-[25vh] sm:h-[25vh] md:h-[40vh] lg:h-[50vh]
                object-cover
            " />
    </div>

    <div class="relative z-20">
        <div x-data="textSequence()" x-init="observe()" class="relative min-h-[60vh] text-white" x-ref="trigger">
            <!-- One Phone -->
            <div 
                class="
                    absolute
                    w-full text-center text-black
                    text-5xl sm:text-5xl md:text-6xl lg:text-8xl 
                    font-barlow font-black text-one-phone 
                    whitespace-nowrap
                    md:w-auto md:left-[5%] md:text-left
                    drop-shadow-md
                "
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
                class="
                    absolute 
                    w-full text-center 
                    text-5xl sm:text-5xl md:text-6xl lg:text-8xl 
                    font-barlow font-black text-one-planet 
                    whitespace-nowrap
                    md:w-auto md:left-1/2 md:-translate-x-1/2 md:text-left
                    drop-shadow-md
                "
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
                class="
                    absolute 
                    w-full text-center text-black
                    text-5xl sm:text-5xl md:text-6xl lg:text-8xl 
                    font-barlow font-black text-make-it-count 
                    whitespace-nowrap
                    md:w-auto md:right-[5%] md:text-right
                    drop-shadow-md
                "
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
        top: 65%;
      }
      .text-one-planet {
        top: 77%;
      }
      .text-make-it-count {
        top: 89%;
      }

      @media (min-width: 768px) {
        .text-one-phone { top: 75%; }
        .text-one-planet { top: 90%; }
        .text-make-it-count { top: 105%; }
      }

      @media (min-width: 1024px) {
        .text-one-phone { top: 75%; }
        .text-one-planet { top: 95%; }
        .text-make-it-count { top: 115%; }
      }
    </style>
    @endpush
</x-company-layout>
