<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen bg-gray-100">
        @include($nav ?? 'layouts.navigation')

        <main>
            <div class="grid grid-cols-5 gap-4 px-6 mx-20 py-8">
                <div class="w-full h-screen">
                    <p class="font-semibold text-2xl">Filter</p>
                    @php
                        $carriers = [
                            'AT&T Wireless',
                            'Boost Mobile',
                            'Simple Mobile',
                            'Sprint',
                            'Straight Talk',
                            'T-Mobile',
                            'Ting',
                            'Total Wireless',
                            'TracFone Wireless',
                            'Unlocked',
                            'Verizon Wireless',
                        ];

                        $androidVersions = [
                            'Android 10.0',
                            'Android 11.0',
                            'Android 12.0',
                            'Android 13.0',
                            'Android 14.0',
                            'Android 15.0',
                            'Android 4.0',
                            'Android 4.1',
                        ];
                    @endphp

                    <div class="mt-2 shadow-2xl rounded-lg px-8 py-2">
                        <p class="mb-3 text-gray-500 font-semibold text-lg">{{ __('Carier') }}</p>
                        <!-- 📦 Carrier Filter -->
                        @foreach ($carriers as $carrier)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" id="carrier-{{ $loop->index }}" name="carriers[]"
                                    value="{{ $carrier }}"
                                    class="w-4 h-4 text-black bg-gray-100 border-black border-[2px] rounded-sm focus:ring-black focus:ring-2">
                                <label for="carrier-{{ $loop->index }}" class="ms-2 text-sm font-medium text-black">
                                    {{ $carrier }}
                                </label>
                            </div>
                        @endforeach
                        <div class="mt-6 mb-3 border-gray-300 border-t-[1px]"></div>
                        <!-- 🖥 Section Title -->
                        <p class="mb-3 text-gray-500 font-semibold text-lg">{{ __('Operating System') }}</p>

                        <!-- 📱 Android Versions Filter -->
                        @foreach ($androidVersions as $version)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" id="os-{{ $loop->index }}" name="android_versions[]"
                                    value="{{ $version }}"
                                    class="w-4 h-4 text-black bg-gray-100 border-black border-[2px] rounded-sm focus:ring-black focus:ring-2">
                                <label for="os-{{ $loop->index }}" class="ms-2 text-sm font-medium text-black">
                                    {{ $version }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full h-screen col-span-4 ms-10">
                    <div class="w-full text-lg space-x-4 mb-8">
                        <x-nav-link :href="route('market')" :active="false">
                            {{ __('Short') }}
                        </x-nav-link>
                        <x-nav-link :href="route('market')" :active="true">
                            {{ __('Latest') }}
                        </x-nav-link>
                        <x-nav-link :href="route('market')" :active="false">
                            {{ __('Popular') }}
                        </x-nav-link>
                        <x-nav-link :href="route('market')" :active="false">
                            {{ __('Best Seller') }}
                        </x-nav-link>
                        <x-nav-link :href="route('market')" :active="false">
                            {{ __('Price') }}
                        </x-nav-link>
                    </div>
                    <div class="container">
                        <div class="grid grid-cols-2 gap-6">

                            @php
                                $products = [
                                    [
                                        'name' => 'Onephone',
                                        'image' => 'market_one_edited.png',
                                        'price' => 252,
                                        'rating' => 4.79,
                                        'features' => 2,
                                        'sold' => '2,5',
                                    ],
                                    [
                                        'name' => 'Neuphone',
                                        'image' => 'market_neu.png',
                                        'price' => 252,
                                        'rating' => 4.73,
                                        'features' => 2,
                                        'sold' => '2,5',
                                    ],
                                    [
                                        'name' => 'Xarelphone',
                                        'image' => 'market_xarel.png',
                                        'price' => 252,
                                        'rating' => 4.43,
                                        'features' => 2,
                                        'sold' => '2,5',
                                    ],
                                    [
                                        'name' => 'Zenophone',
                                        'image' => 'market_zeno.png',
                                        'price' => 252,
                                        'rating' => 4.39,
                                        'features' => 2,
                                        'sold' => '2,5',
                                    ],
                                ];
                            @endphp

                            @foreach ($products as $product)
                                <div
                                    class="bg-white rounded-lg shadow-md p-4 flex justify-between border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                                    <a href="/{{ strtolower($product['name']) }}">
                                        <div class="flex justify-center items-center h-full">
                                            <img src="{{ asset('images/' . $product['image']) }}"
                                                alt="{{ $product['name'] }}" class="w-[26rem] mx-auto object-contain">
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h3 class="text-2xl font-semibold mb-1">{{ $product['name'] }}</h3>
                                            <p class="text-gray-600 mb-2 text-base/2">
                                                {{ __('Product Description ' . $product['name']) }}</p>
                                            <div class="text-gray-500 flex flex-row items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                                    viewBox="0 0 640 640">
                                                    <path fill="#FFD43B"
                                                        d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z" />
                                                </svg>
                                                <p class="font-semibold text-lg ms-[2px]">{{ $product['rating'] }}</p>
                                                <p class="text-gray-500 ms-2">| {{ $product['sold'] }}
                                                    {{ __('Bought in past month') }}</p>
                                            </div>
                                            @if ($product['name'] == 'Onephone')
                                                <div class="my-2 text-3xl font-bold text-black">
                                                    ${{ $product['price'] }}
                                                </div>
                                            @else
                                                <div class="my-2 text-3xl font-bold text-black">
                                                    ${{ $product['price'] }}
                                                </div>
                                            @endif
                                            @if ($product['name'] == 'Onephone')
                                                <div class="sustainability-container relative">
                                                    <a href="#"
                                                        class="sustainability-toggle flex items-center gap-1 text-gray-500 mt-1 hover:text-gray-800 focus:text-blue-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                            width="20" viewBox="0 0 640 640">
                                                            <path fill="#84bc41"
                                                                d="M576 96C576 204.1 499.4 294.3 397.6 315.4C389.7 257.3 363.6 205 325.1 164.5C365.2 104 433.9 64 512 64L544 64C561.7 64 576 78.3 576 96zM64 160C64 142.3 78.3 128 96 128L128 128C251.7 128 352 228.3 352 352L352 544C352 561.7 337.7 576 320 576C302.3 576 288 561.7 288 544L288 384C164.3 384 64 283.7 64 160z" />
                                                        </svg>
                                                        {{ $product['features'] }} {{ __('Sustainability Feature') }}
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="dropdown-arrow ms-1 size-4 transition-transform duration-200">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                        </svg>
                                                    </a>
                                                    <div
                                                        class="sustainability-dropdown absolute top-full left-0 right-0 z-10 hidden bg-white shadow-xl rounded-md mt-1">
                                                        <div class="p-4">
                                                            <p class="text-gray-700 text-sm leading-relaxed mb-3">
                                                                {{ __('Sustainability Description') }}
                                                            </p>
                                                            <div class="space-y-2">
                                                                <div
                                                                    class="border-t border-gray-200 pt-3 text-gray-700 font-medium flex flex-row justify-between items-center">
                                                                    <span
                                                                        class="text-sm">{{ __('Energy Efficiency') }}</span>
                                                                    <img src="{{ asset('images/EU_Ecolabel_Logo.svg') }}"
                                                                        alt="Ecolabel Logo" class="w-8 h-8">
                                                                </div>
                                                                <div
                                                                    class="border-t border-gray-200 pt-2 text-gray-700 font-medium flex flex-row justify-between items-center">
                                                                    <span
                                                                        class="text-sm">{{ __('Sustainable Manufacturing') }}</span>
                                                                    <img src="{{ asset('images/EU_Ecolabel_Logo.svg') }}"
                                                                        alt="Ecolabel Logo" class="w-8 h-8">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($product['name'] == 'Zenophone')
                                                <div class="sustainability-container relative">
                                                    <a href="#"
                                                        class="sustainability-toggle flex items-center gap-1 text-gray-500 mt-1 hover:text-gray-800 focus:text-blue-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                            width="20" viewBox="0 0 640 640">
                                                            <path fill="#84bc41"
                                                                d="M576 96C576 204.1 499.4 294.3 397.6 315.4C389.7 257.3 363.6 205 325.1 164.5C365.2 104 433.9 64 512 64L544 64C561.7 64 576 78.3 576 96zM64 160C64 142.3 78.3 128 96 128L128 128C251.7 128 352 228.3 352 352L352 544C352 561.7 337.7 576 320 576C302.3 576 288 561.7 288 544L288 384C164.3 384 64 283.7 64 160z" />
                                                        </svg>
                                                        {{ $product['features'] }} {{ __('Sustainability Feature') }}
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="dropdown-arrow ms-1 size-4 transition-transform duration-200">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                        </svg>
                                                    </a>
                                                    <div
                                                        class="sustainability-dropdown absolute top-full left-0 right-0 z-10 hidden bg-white shadow-xl rounded-md mt-1">
                                                        <div class="p-4">
                                                            <p class="text-gray-700 text-sm leading-relaxed mb-3">
                                                                {{ __('Sustainability Description') }}
                                                            </p>
                                                            <div class="space-y-2">
                                                                <div
                                                                    class="border-t border-gray-200 pt-3 text-gray-700 font-medium flex flex-row justify-between items-center">
                                                                    <span
                                                                        class="text-sm">{{ __('Energy Efficiency') }}</span>
                                                                    <div class="flex flex-row space-x-2">
                                                                        <img src="{{ asset('images/logo_palsu2.png') }}"
                                                                            alt="Eco Logo" class="w-8 h-8">
                                                                        <img src="{{ asset('images/logo_palsu1.png') }}"
                                                                            alt="Eco Logo" class="w-8 h-8">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="border-t border-gray-200 pt-2 text-gray-700 font-medium flex flex-row justify-between items-center">
                                                                    <span
                                                                        class="text-sm">{{ __('Sustainable Manufacturing') }}</span>
                                                                    <div class="flex flex-row space-x-2">
                                                                        <img src="{{ asset('images/logo_palsu1.png') }}"
                                                                            alt="Eco Logo" class="w-8 h-8">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <a href="/{{ strtolower($product['name']) }}"
                                                class="bg-red-500 w-fit ms-auto mt-2 text-white px-4 py-1 rounded-full text-sm">{{ __('Choose Product') }}</a>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            {{-- <p>session: {{ session('respondent_id') }}</p> --}}
        </main>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Handle all sustainability dropdowns
                const sustainabilityButtons = document.querySelectorAll('.sustainability-toggle');

                sustainabilityButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Find the corresponding dropdown
                        const dropdown = this.nextElementSibling;
                        const arrow = this.querySelector('.dropdown-arrow');

                        // Close other dropdowns
                        document.querySelectorAll('.sustainability-dropdown').forEach(otherDropdown => {
                            if (otherDropdown !== dropdown) {
                                otherDropdown.classList.add('hidden');
                                otherDropdown.previousElementSibling.querySelector(
                                    '.dropdown-arrow').style.transform = 'rotate(0deg)';
                            }
                        });

                        // Toggle current dropdown
                        dropdown.classList.toggle('hidden');

                        // Rotate arrow
                        if (dropdown.classList.contains('hidden')) {
                            arrow.style.transform = 'rotate(0deg)';
                        } else {
                            arrow.style.transform = 'rotate(180deg)';
                        }
                    });
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!e.target.closest('.sustainability-container')) {
                        document.querySelectorAll('.sustainability-dropdown').forEach(dropdown => {
                            dropdown.classList.add('hidden');
                            dropdown.previousElementSibling.querySelector('.dropdown-arrow').style
                                .transform = 'rotate(0deg)';
                        });
                    }
                });
            });
        </script>

    </div>
</body>

</html>
