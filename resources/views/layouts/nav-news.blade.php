<div x-data="{ open: false }" class="fixed top-0 left-0 z-50 w-full bg-white/90 backdrop-blur-md shadow">
  <!-- Navbar Container -->
  <div class="flex items-center justify-between px-4 py-3 md:px-6 md:py-2">

    <!-- Logo + Navigation -->
    <div class="flex items-center">
      <h1 class="text-black text-xl font-bold tracking-wide">
        🌍 TERRANEWS
      </h1>

      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center space-x-6 ml-10 text-sm">
        <a href="/news" class="hover:underline">NEWS</a>
        <a href="/markets" class="hover:underline">MARKETS</a>
        <a href="/economics" class="hover:underline">ECONOMICS</a>
        <a href="/industry" class="hover:underline">INDUSTRY</a>
        <a href="/tech" class="hover:underline">TECH</a>
        <a href="/politics" class="hover:underline">POLITICS</a>
        <a href="/more" class="hover:underline">MORE</a>
      </div>
    </div>

    <!-- Right Side -->
    <div class="flex items-center space-x-4">
      <!-- Desktop Right Buttons -->
      <div class="hidden md:flex items-center space-x-4 text-sm">
        <x-languange-switch />
        <!-- Search Icon -->
        <button class="text-gray-700 hover:text-black">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
               viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 6.65a7.5 7.5 0 010 10.6z" />
          </svg>
        </button>
      </div>

      <!-- Mobile Hamburger -->
      <div class="md:hidden flex items-center">
        <x-languange-switch class="mr-2" />
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
  <div x-show="open" x-transition class="md:hidden bg-white/95 backdrop-blur-sm border-t z-40 w-full">
    <div class="flex flex-col px-4 py-4 space-y-3 text-sm">
      <a href="/news" class="hover:underline">NEWS</a>
      <a href="/markets" class="hover:underline">MARKETS</a>
      <a href="/economics" class="hover:underline">ECONOMICS</a>
      <a href="/industry" class="hover:underline">INDUSTRY</a>
      <a href="/tech" class="hover:underline">TECH</a>
      <a href="/politics" class="hover:underline">POLITICS</a>
      <a href="/more" class="hover:underline">MORE</a>
    </div>
  </div>
</div>
