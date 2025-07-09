<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Xarelonphone</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans">

    <!-- Background Image -->
    <div class="relative min-h-screen bg-cover bg-center"
         style="background-image: url('{{ asset('images/xarelonphone_bg.png') }}');">

        <!-- Overlay to darken background slightly -->
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

        <!-- Header -->
        <header class="relative z-10 flex justify-between items-center px-4 md:px-8 py-4">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/logo_xar7.png') }}" alt="Logo" class="h-8 object-contain">
                <span class="text-2xl font-bold text-white">XARELONPHONE</span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-4">
                <input type="text" placeholder="Search"
                       class="px-2 py-1 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                <a href="#" class="text-white hover:text-gray-300 text-sm">Shop</a>
                <a href="#" class="text-white hover:text-gray-300 text-sm">About</a>
                <a href="#" class="text-white hover:text-gray-300 text-sm">Stories</a>
                <a href="#" class="text-white hover:text-gray-300 text-sm">Businesses</a>
                <a href="#" class="text-white hover:text-gray-300 text-sm">Support</a>
            </div>

            <!-- Mobile Hamburger -->
            <div class="md:hidden flex items-center">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu Links -->
            <div id="mobile-menu" class="hidden flex-col space-y-2 mt-2 bg-black bg-opacity-70 p-4 rounded-lg">
                <a href="#" class="block text-white hover:text-gray-300 text-sm">Shop</a>
                <a href="#" class="block text-white hover:text-gray-300 text-sm">About</a>
                <a href="#" class="block text-white hover:text-gray-300 text-sm">Stories</a>
                <a href="#" class="block text-white hover:text-gray-300 text-sm">Businesses</a>
                <a href="#" class="block text-white hover:text-gray-300 text-sm">Support</a>
            </div>

            <script>
                // Toggle mobile menu
                document.getElementById('menu-toggle').addEventListener('click', function () {
                    const menu = document.getElementById('mobile-menu');
                    menu.classList.toggle('hidden');
                });
            </script>

        </header>

        <!-- Hero Section -->
        <div class="relative z-10 flex flex-col justify-center items-start min-h-[calc(100vh-80px)] px-4 md:px-20 text-center md:text-left">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white leading-tight mb-4 drop-shadow">
                Smart Just<br>
                Got Smarter<br>
                Powered Phone
            </h1>
            <button
                class="bg-blue-600 text-white px-5 py-2 rounded-full text-base sm:text-lg font-semibold shadow hover:bg-blue-700 transition duration-300">
                Just for You
            </button>
        </div>

    </div>

</body>
</html>
