<div x-data="{ open: false, active: '#beranda' }" class="sticky top-0 z-50 w-full bg-transparent">
  <!-- Header -->
  <div class="flex items-center justify-between px-4 py-3 md:px-6 md:py-2">
    <div class="flex items-center">
        <h1 class="text-white text-xl font-bold mr-4">
            {{ $logo ?? 'Company Name' }}
        </h1>
    </div>

    <!-- Tengah: Search Bar (Desktop Only) -->
    <div class="hidden md:flex flex-1 justify-center px-4">
      <div class="relative w-full max-w-md">
        <input type="text" placeholder="Search"
               class="w-full pl-4 pr-10 py-2 rounded-md bg-white text-sm text-black focus:outline-none focus:ring focus:ring-blue-300" />
        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
      </div>
    </div>

    <!-- Kanan: Navigasi -->
    <div class="flex items-center space-x-4">
      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-6 text-white text-sm items-center">
        <a href="#shop" class="hover:underline">Shop</a>
        <a href="#about" class="hover:underline">About</a>
        <a href="#stories" class="hover:underline">Aerophone Stories</a>
        <a href="#business" class="hover:underline">Business</a>
        <a href="#support" class="hover:underline">Support</a>
        <x-icon.user />
        <x-icon.shopping-basket />
        <x-languange-switch class="hidden md:flex"/>
      </div>

      <!-- Mobile: Switch + Hamburger -->
      <div class="flex items-center space-x-3 md:hidden">
        <div x-data="{ checked: false }" class="flex items-center space-x-1 text-xs">
            <span :class="{ 'text-gray-400': checked, 'text-white': !checked }">EN</span>

            <div class="w-[44px] h-[26px] relative">
                <input type="checkbox" id="lang-toggle-mobile" x-model="checked" class="sr-only">
                <label for="lang-toggle-mobile"
                      class="block w-full h-full bg-gray-200 rounded-full cursor-pointer transition-colors duration-200"
                      :class="{ 'bg-green-500': checked }">
                    <div class="absolute w-[22px] h-[22px] top-[2px] rounded-full shadow transition-all duration-200 overflow-hidden"
                        :style="checked ? 'left:20px' : 'left:2px'">
                        <img :src="checked ? '/images/flag_id.png' : '/images/flag_en.png'"
                            alt="Lang Flag" class="w-full h-full object-cover rounded-full">
                    </div>
                </label>
            </div>

            <span :class="{ 'text-white': checked, 'text-gray-400': !checked }">ID</span>
        </div>

        <!-- Hamburger -->
        <button @click="open = !open" class="text-white focus:outline-none">
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
       class="md:hidden bg-white text-black absolute top-full w-full left-0 z-40 border-t">
    <div class="flex flex-col px-4 py-3 space-y-2">
      <input type="text" placeholder="Search"
             class="w-full pl-4 pr-4 py-2 rounded-md bg-gray-100 text-sm text-black" />
      <a href="#shop" class="hover:underline">Shop</a>
      <a href="#about" class="hover:underline">About</a>
      <a href="#stories" class="hover:underline">Aerophone Stories</a>
      <a href="#business" class="hover:underline">Business</a>
      <a href="#support" class="hover:underline">Support</a>
    </div>
  </div>
</div>
