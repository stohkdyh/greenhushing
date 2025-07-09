<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>XarelonPhone 7</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-900">

    <!-- PAGE 1 -->
    <div class="bg-white w-full h-screen flex flex-col">
        <!-- Header -->
        <header class="flex justify-between items-center px-6 py-4">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/logo_xar7.png') }}" alt="Logo" class="h-9 object-contain">
                <span class="text-black font-bold">XARELONPHONE 7</span>
            </div>
            <nav class="flex items-center space-x-6">
                <a href="#" class="text-black hover:underline">Overview</a>
                <a href="#" class="text-black hover:underline">Specs</a>
                <div class="flex space-x-2">
                    <a href="#" class="text-black text-sm border px-1 py-0.5 rounded">EN</a>
                    <a href="#" class="text-gray-400 text-sm border px-1 py-0.5 rounded">ID</a>
                </div>
                <a href="#" class="bg-blue-900 text-white px-4 py-1 rounded-full hover:bg-blue-700 transition">Buy Now →</a>
            </nav>
        </header>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col md:flex-row items-center px-6 md:px-16">
            <!-- Left Content -->
            <div class="flex-1 space-y-5">
                <h2 class="text-2xl md:text-3xl font-semibold">XaleronPhone 7</h2>
                <div class="flex space-x-1 text-yellow-500 text-xl md:text-2xl">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
                    Next-Level Living<br>of Smartphone
                </h1>
                <div class="bg-green-300 text-green-900 inline-block px-4 py-2 rounded-full font-bold text-lg md:text-xl">
                    In Your Hands
                </div>
                <p class="text-lg md:text-xl">
                    from <span class="text-3xl font-bold">$212</span>
                </p>
                <button
                    class="bg-green-800 text-white px-6 py-3 rounded-full text-lg md:text-xl hover:bg-green-700 transition">
                    Buy Now →
                </button>
            </div>

            <!-- Right Content -->
            <div class="flex-1 flex justify-center mt-8 md:mt-0">
                <img src="{{ asset('images/product_xar.png') }}" alt="XarelonPhone Box" class="w-80 md:w-[350px]">
            </div>
        </div>
    </div>

    <!-- PAGE 2 -->
    <div class="bg-gray-900 text-white h-screen flex flex-col md:flex-row items-center px-6 md:px-16">
        <!-- Left Text -->
        <div class="flex-1 text-center md:text-left space-y-6">
            <p class="text-lg md:text-xl leading-relaxed">
                Innovation opens new possibilities. With engineering marvel and craftsmanship, 
                the perfect balance is now a reality. Welcome to the Edge of premium slim
            </p>
            <div class="inline-flex items-center bg-white text-black px-4 py-2 rounded-md font-bold">
                <svg class="w-5 h-5 text-blue-700 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M11 17a1 1 0 01-1 1 1 1 0 01-1-1v-2a1 1 0 112 0v2zm-1-4a1 1 0 01-1-1V9a1 1 0 012 0v3a1 1 0 01-1 1zm0-8a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                </svg>
                Modern Design
            </div>
        </div>

        <!-- Right Image -->
        <div class="flex-1 flex justify-center mt-6 md:mt-0">
            <div>
                <img src="{{ asset('images/hp_xar.png') }}" alt="Slim Design" class="w-60 md:w-72">
            </div>
        </div>
    </div>

    <!-- PAGE 3 -->
    <div class="relative h-screen bg-cover bg-center flex items-center justify-center"
        style="background-image: url('{{ asset('images/xar_bg.png') }}');">

        <div class="flex flex-col md:flex-row items-center justify-between w-full max-w-7xl px-6 md:px-16">
            <!-- Left Image -->
            <div class="flex-1 flex justify-center">
                <img src="{{ asset('images/hp_xar2.png') }}" alt="Slim Design" class="w-60 md:w-80 drop-shadow-lg">
            </div>

            <!-- Right Text -->
            <div class="flex-1 text-center md:text-left space-y-6">
                <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight">
                    100% charged <br> within one hour
                </h1>
                <div class="inline-flex items-center bg-white text-black px-4 py-2 rounded-md font-bold shadow">
                    <svg class="w-5 h-5 text-blue-700 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 10V7h-3V4h-2v3H5v2h3v3h2v-3h3z"/>
                    </svg>
                    Fast Charging
                </div>
            </div>
        </div>

    </div>


</body>
</html>
