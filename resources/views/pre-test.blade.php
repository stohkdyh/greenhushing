<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f3f7f0] min-h-screen flex flex-col">

    <!-- Navbar -->
    <header
        class="flex fixed top-0 left-0 right-0 justify-between items-center px-14 py-2 bg-white bg-opacity-40 backdrop-blur-md shadow-md z-50">
        <!-- Kiri: Hamburger + Title -->
        <div class="flex items-center gap-8">
            <button class="p-2">
                <!-- Hamburger icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h1 class="font-bold text-xl">Pre-Test</h1>
        </div>

        <!-- Kanan: Logo + Language Switch -->
        <div class="flex items-center gap-4">
            <x-languange-switch class="h-full px-0" />
            <div class="flex items-center gap-3  px-3 py-1 rounded-full">
                <img src="{{ asset('images/logo_uny.png') }}" alt="Logo UNY" class="w-11 h-11">
                <img src="{{ asset('images/logo_nucb.png') }}" alt="Logo NUCB" class="w-11 h-11">
            </div>
        </div>
    </header>

    <!-- Progress bar -->
    <div class="w-11/12 md:w-1/2 mx-auto mt-[110px]">
        <div class="w-full bg-green-200 rounded-full h-2">
            <div class="bg-green-700 h-2 rounded-full" style="width: 30%"></div>
        </div>
    </div>

    <!-- Card Questions -->
    <main class="flex-1 w-11/12 md:w-1/2 mx-auto mt-6 space-y-6">
        @for ($i = 1; $i <= 5; $i++)
            <div class="bg-white rounded-lg shadow-md p-6">
                <p class="mb-4 text-center font-medium">
                    You feel that this product's environmental reputation is generally reliable
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500 text-center w-16 leading-tight">
                        Strongly<br>Agree
                    </span>
                    <div class="flex space-x-7">
                        <input type="radio" name="q{{ $i }}" class="w-6 h-6 accent-green-700">
                        <input type="radio" name="q{{ $i }}" class="w-6 h-6 accent-green-500">
                        <input type="radio" name="q{{ $i }}" class="w-6 h-6 accent-green-300">
                        <input type="radio" name="q{{ $i }}" class="w-6 h-6 accent-yellow-200">
                        <input type="radio" name="q{{ $i }}" class="w-6 h-6 accent-yellow-400">
                        <input type="radio" name="q{{ $i }}" class="w-6 h-6 accent-orange-300">
                        <input type="radio" name="q{{ $i }}" class="w-6 h-6 accent-orange-500">
                        <input type="radio" name="q{{ $i }}" class="w-6 h-6 accent-red-400">
                    </div>
                    <span class="text-sm text-gray-500">Strongly <br> Disagree</span>
                </div>
            </div>
        @endfor
    </main>

    <!-- Submit button -->
    <div class="w-11/12 md:w-1/2 mx-auto my-6 text-right">
        <button class="bg-green-700 text-white px-6 py-2 rounded-full shadow-md hover:bg-green-600">
            Submit
        </button>
    </div>

</body>

</html>
