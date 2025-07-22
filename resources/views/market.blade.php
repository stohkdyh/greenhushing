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
                        <p class="mb-3 text-gray-500 font-semibold text-lg">Carier</p>
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
                        <p class="mb-3 text-gray-500 font-semibold text-lg">Operating System</p>

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
                    <div class="grid grid-cols-2">
                        {{-- @extends('layouts.app') or use your layout file --}}

                        {{-- @section('content') --}}
                        <div class="container mx-auto px-4 py-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                                @php
                                    $products = [
                                        [
                                            'name' => 'AERA One',
                                            'image' => 'aera.png',
                                            'desc' =>
                                                'Modular design – Parts can be reused and upgraded, Durable Design, Super Fast Charging, Expandable Storage, ID Version, 2025, Green',
                                            'price' => 252,
                                            'rating' => 4,
                                            'features' => 2,
                                            'sold' => '2,5 bought in past month',
                                        ],
                                        [
                                            'name' => 'NEUVERA Phone',
                                            'image' => 'neuvera.png',
                                            'desc' =>
                                                'Durable Design, Super Fast Charging, Water Resistance, Expandable Storage, ID Version, 2025, Green',
                                            'price' => 252,
                                            'rating' => 4,
                                            'features' => 2,
                                            'sold' => '2,5 bought in past month',
                                        ],
                                        [
                                            'name' => 'ZENOPHONE 4',
                                            'image' => 'zenophone.png',
                                            'desc' =>
                                                'Modular design – Parts can be reused and upgraded, Durable Design, Super Fast Charging, Expandable Storage, ID Version, 2025, Green',
                                            'price' => 252,
                                            'rating' => 4,
                                            'features' => 2,
                                            'sold' => '2,5 bought in past month',
                                        ],
                                        [
                                            'name' => 'XARELPHONE 7',
                                            'image' => 'xarelphone.png',
                                            'desc' =>
                                                'Durable Design, Super Fast Charging, Water Resistance, Expandable Storage, ID Version, 2025, Green',
                                            'price' => 252,
                                            'rating' => 4,
                                            'features' => 2,
                                            'sold' => '2,5 bought in past month',
                                        ],
                                    ];
                                @endphp

                                @foreach ($products as $product)
                                    <div
                                        class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between border border-gray-200">
                                        <div>
                                            <img src="{{ asset('images/' . $product['image']) }}"
                                                alt="{{ $product['name'] }}"
                                                class="h-40 w-auto mx-auto mb-3 object-contain">
                                            <h3 class="text-sm font-semibold mb-1">{{ $product['name'] }}</h3>
                                            <p class="text-sm text-gray-600">{{ $product['desc'] }}</p>
                                        </div>
                                        <div class="mt-4 text-sm text-gray-500">
                                            ⭐ {{ $product['rating'] }}<br>
                                            {{ $product['sold'] }}
                                        </div>
                                        <div class="mt-3 text-xl font-semibold text-black">${{ $product['price'] }}
                                        </div>
                                        <div class="flex items-center gap-2 text-sm text-green-600 mt-1">
                                            🌿 {{ $product['features'] }} fitur <span
                                                class="italic text-gray-500">sustainability</span>
                                        </div>
                                        <div class="flex items-center justify-between mt-4">
                                            <button class="bg-red-500 text-white px-4 py-1 rounded-full text-sm">Pilih
                                                Produk</button>
                                            <button class="text-gray-600 hover:text-red-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 15l7-7 7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        {{-- @endsection --}}

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
