<section class="relative isolate min-h-screen overflow-hidden bg-white mt-14">
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full bg-cover bg-center bg-no-repeat"
             style="background-image:url('{{ asset('images/background_aerophone.png') }}')">
        </div>
        <div class="absolute inset-x-0 bottom-0 h-32 pointer-events-none"
             style="background:linear-gradient(to bottom,rgba(255,255,255,0) 0%,#ffffff 100%);">
        </div>
    </div>
    <div class="absolute inset-x-0 top-[15vh] sm:top-[15vh] md:top-[10vh] lg:top-[0vh] z-10 overflow-hidden">
        <img src="{{ asset('images/handbackground_aerophone.png') }}"
             alt="Hand"
             class="w-full h-[25vh] sm:h-[25vh] md:h-[30vh] lg:h-[50vh] object-cover"/>
    </div>

    <div x-data="textSequence()" x-init="observe()"
         class="relative z-20 min-h-[60vh] flex items-end"
         x-ref="trigger">  

        <!-- One Phone -->
        <h2 class="absolute text-one-phone w-full text-center md:left-[5%] md:w-auto md:text-left
                    font-barlow font-black whitespace-nowrap drop-shadow-sm
                    text-6xl sm:text-6xl md:text-7xl lg:text-8xl text-white"
            x-show="showPhone"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 translate-y-8"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-cloak>
            One Phone
        </h2>

        <!-- One Planet -->
        <h2 class="absolute text-one-planet w-full text-center md:left-1/2 md:-translate-x-1/2 md:w-auto md:text-left
                    font-barlow font-black whitespace-nowrap drop-shadow-sm
                    text-6xl sm:text-6xl md:text-7xl lg:text-8xl"
            x-show="showPlanet"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 translate-y-8"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-cloak>
            One Planet
        </h2>

        <!-- Make it Count -->
        <h2 class="absolute text-make-it-count w-full text-center md:right-[5%] md:w-auto md:text-right
                    font-barlow font-black whitespace-nowrap drop-shadow-sm
                    text-6xl sm:text-6xl md:text-7xl lg:text-8xl text-white"
            x-show="showCount"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 translate-y-8"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-cloak>
            Make it Count
        </h2>
    </div>
</section>


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
        top: 95%;
      }
      .text-make-it-count {
        top: 110%;
      }

      @media (min-width: 768px) {
        .text-one-phone { top: 70%; }
        .text-one-planet { top: 90%; }
        .text-make-it-count { top: 110%; }
      }

      @media (min-width: 1024px) {
        .text-one-phone { top: 70%; }
        .text-one-planet { top: 95%; }
        .text-make-it-count { top: 120%; }
      }
    </style>
    @endpush