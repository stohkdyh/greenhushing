{{-- filepath: c:\Users\ASUS\Herd\greenhushing\resources\views\partials\product-card.blade.php --}}
<div class="product-card relative transition-all duration-300" data-product="{{ strtolower($product['name']) }}">

    <!-- Rated overlay -->
    <div
        class="rated-overlay absolute inset-0 bg-gray-900 bg-opacity-50 rounded-lg z-10 hidden flex items-center justify-center">
        <div class="text-center">
            <div
                class="w-12 h-12 sm:w-16 sm:h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <p class="text-white font-semibold text-sm sm:text-lg">{{ __('Rated!') }}</p>
            <p class="text-gray-200 text-xs sm:text-sm rated-score"></p>
        </div>
    </div>

    <div
        class="bg-white h-full rounded-lg shadow-md border border-gray-200 hover:shadow-2xl transition-shadow duration-300 overflow-visible">
        <a href="/{{ strtolower($product['name']) }}" class="product-link block">

            <!-- Header Section with Product Name and Image -->
            <div class="px-3 pt-3 pb-2">
                <!-- Product Header -->
                <div class="flex items-start gap-4">
                    <!-- Product Image - Made Wider -->
                    <div class="flex-shrink-0">
                        <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}"
                            class="w-24 h-28 sm:w-32 sm:h-36 lg:w-40 lg:h-44 object-contain">
                    </div>

                    <!-- Product Info -->
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-2 text-gray-900 leading-tight">
                            {{ $product['name'] }}
                        </h3>

                        <!-- Product Features/Description -->
                        <div class="text-gray-600 text-xs sm:text-sm lg:text-base space-y-1 mb-3">
                            @if ($product['name'] == 'Onephone')
                                <p>{{ __('Modular design, Durable Design,') }}</p>
                                <p>{{ __('Super Fast Charging, Expandable') }}</p>
                                <p>{{ __('Storage, ID Version, 2025') }}</p>
                            @elseif($product['name'] == 'Neuphone')
                                <p>{{ __('Durable Design, Super Fast Charging,') }}</p>
                                <p>{{ __('Water Resistance, Expandable') }}</p>
                                <p>{{ __('Storage, Titanium Frame, ID Version,') }}</p>
                                <p>{{ __('2025') }}</p>
                            @elseif($product['name'] == 'Xarelphone')
                                <p>{{ __('Durable Design, Super Fast Charging,') }}</p>
                                <p>{{ __('Water Resistance, Expandable Storage,') }}</p>
                                <p>{{ __('Slim Premium Design, ID Version,') }}</p>
                                <p>{{ __('2025') }}</p>
                            @elseif($product['name'] == 'Zenophone')
                                <p>{{ __('Modular design, Durable Design,') }}</p>
                                <p>{{ __('Super Fast Charging, Expandable') }}</p>
                                <p>{{ __('Storage, ID Version, 2025') }}</p>
                            @endif
                        </div>

                        <!-- Rating and Sales Info -->
                        <div class="flex items-center gap-2 text-xs sm:text-sm mb-3">
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 fill-yellow-400">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="font-semibold text-gray-900">{{ $product['rating'] }}</span>
                            </div>
                            <span class="text-gray-400">|</span>
                            <span class="text-gray-600">{{ $product['sold'] }}
                                {{ __('Millions of products sold') }}</span>
                        </div>

                        <!-- Price -->
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900">
                            ${{ $product['price'] }}
                        </div>
                    </div>
                </div>

                <!-- Sustainability Features - Moved Outside of Product Info -->
                @if (in_array($product['name'], ['Onephone', 'Zenophone']))
                    <div class="sustainability-container relative">
                        <button
                            class="sustainability-toggle flex items-center gap-2 text-green-600 hover:text-green-700 focus:text-green-800 text-sm sm:text-base font-medium w-full text-left p-2 rounded-md hover:bg-green-50 transition-colors duration-200 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640">
                                <path fill="#84bc41"
                                    d="M576 96C576 204.1 499.4 294.3 397.6 315.4C389.7 257.3 363.6 205 325.1 164.5C365.2 104 433.9 64 512 64L544 64C561.7 64 576 78.3 576 96zM64 160C64 142.3 78.3 128 96 128L128 128C251.7 128 352 228.3 352 352L352 544C352 561.7 337.7 576 320 576C302.3 576 288 561.7 288 544L288 384C164.3 384 64 283.7 64 160z" />
                            </svg>
                            <span>{{ $product['features'] ?? 2 }} {{ __('Sustainability Feature') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="dropdown-arrow ml-auto w-4 h-4 sm:w-5 sm:h-5 transition-transform duration-200">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>

                        <div
                            class="sustainability-dropdown absolute top-full left-0 right-0 z-50 hidden bg-white shadow-2xl rounded-lg mt-2 border border-gray-200 overflow-hidden">
                            <div class="p-4 sm:p-6">
                                <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-4">
                                    {{ __('This product features sustainable manufacturing and eco-friendly materials designed to reduce environmental impact.') }}
                                </p>
                                <div class="space-y-3">
                                    <div
                                        class="border-t border-gray-200 pt-3 text-gray-700 font-medium flex flex-row justify-between items-center">
                                        <span class="text-sm sm:text-base">{{ __('Energy Efficiency') }}</span>
                                        @if ($product['name'] == 'Onephone')
                                            <img src="{{ asset('images/logo_palsu.png') }}" alt="Ecolabel Logo"
                                                class="w-8 h-8 sm:w-10 sm:h-10">
                                        @else
                                            <img src="{{ asset('images/logoclaimzeno.png') }}" alt="Eco Logo"
                                                class="w-8 h-8 sm:w-10 sm:h-10">
                                        @endif
                                    </div>
                                    <div
                                        class="border-t border-gray-200 pt-3 text-gray-700 font-medium flex flex-row justify-between items-center">
                                        <span class="text-sm sm:text-base">{{ __('Sustainable Manufacturing') }}</span>
                                        @if ($product['name'] == 'Onephone')
                                            <img src="{{ asset('images/logo_palsu.png') }}" alt="Ecolabel Logo"
                                                class="w-8 h-8 sm:w-10 sm:h-10">
                                        @else
                                            <img src="{{ asset('images/logoclaimzeno.png') }}" alt="Eco Logo"
                                                class="w-8 h-8 sm:w-10 sm:h-10">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </a>

        <!-- Choose Product Button -->
        @if (in_array($product['name'], ['Neuphone', 'Xarelphone']))
            <div class="px-3 pb-3 sm:px-4 sm:pb-4 pt-5">
                <a href="/{{ strtolower($product['name']) }}"
                    class="block w-full bg-red-500 hover:bg-red-600 text-white py-3 px-4 rounded-lg text-sm sm:text-base font-medium choose-product-btn text-center transition-colors duration-200">
                    {{ __('Choose Product') }}
                </a>
            </div>
        @else
            <div class="px-3 pb-3 sm:px-4 sm:pb-4">
                <a href="/{{ strtolower($product['name']) }}"
                    class="block w-full bg-red-500 hover:bg-red-600 text-white py-3 px-4 rounded-lg text-sm sm:text-base font-medium choose-product-btn text-center transition-colors duration-200">
                    {{ __('Choose Product') }}
                </a>
            </div>
        @endif
    </div>
</div>
