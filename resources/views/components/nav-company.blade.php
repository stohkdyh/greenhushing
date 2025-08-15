<div x-data="{ open: false, active: '#overview' }" class="fixed top-0 left-0 z-50 w-full bg-white/85 backdrop-blur-md">
  <!-- Header -->
  <div class="flex items-center justify-between px-4 py-3 md:px-6 md:py-2">
    <div class="flex items-center">
    <h1 class="text-black text-xl font-barlow font-bold">
      {{ $logo ?? 'Company Name' }}
    </h1>
    <div class="hidden md:flex items-center space-x-6 md:ml-8 lg:ml-16">
      <a href="#overview" class="hover:underline">{{ __('Overview') }}</a>
      <a href="#specs" class="hover:underline">{{ __('Specs') }}</a>
      <a href="#productenvironmentalreport" class="hover:underline">
        {{ __('Product Environmental Report') }}
      </a>
    </div>
  </div>

        <!-- Kanan: Navigasi -->
        <div class="flex items-center space-x-4">
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6 text-black text-sm items-center">
                <x-languange-switch class="hidden md:flex" />
                <div class="flex flex-col items-start justify-center text-right leading-none">
                    <span class="text-base font-semibold text-black">
                        {{ __('From')}} <span class="text-xs align-super">$</span>{{ number_format($price ?? 252, 0, '.', ',') }}
                    </span>
                    <span class="text-xs text-gray-500 italic">{{ __('*Free delivery')}}</span>
                </div>
                <button
                    class="bg-[#1C4F2B] hover:bg-green-700 text-white text-sm font-semibold px-6 py-2 rounded-md shadow">
                    {{ __('Buy')}}
                </button>
            </div>


            <!-- Mobile: Switch + Hamburger -->
            <div class="flex items-center space-x-3 md:hidden">
                <x-languange-switch class="mr-4" />

                <!-- Hamburger -->
                <button @click="open = !open" class="text-black focus:outline-none">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition
        class="md:hidden bg-white/20 backdrop-blur-md text-black absolute top-full w-full left-0 z-40 border-t">
        <div class="flex flex-col px-4 py-3 space-y-2">
            <a href="#overview" class="hover:underline">{{ __('Overview') }}</a>
            <a href="#specs" class="hover:underline">{{ __('Specs') }}</a>
            <a href="#productenvironmentalreport" class="hover:underline">{{ __('Product Environmental Report') }}</a>
        </div>
    </div>
</div>
