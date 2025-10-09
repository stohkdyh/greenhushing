<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name', 'TERRANEWS'))</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-white text-gray-900">
    <x-nav-news />

    <main class="pt-24 px-4 md:px-8 max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="w-full md:w-3/4 md:pr-6 md:border-r md:border-gray-200">
                @yield('content')
            </div>

            <div class="w-full mt-8 md:mt-0 md:w-1/4 md:pl-6">
                @yield('sidebar')
            </div>
        </div>

        <div class="my-6 px-4 py-4 bg-blue-50 rounded-lg border border-blue-200">
            <div class="flex items-center mb-3">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="font-bold text-blue-800">{{ __('Post Test Required') }}</h3>
            </div>
            <p class="text-blue-700 mb-3">
                {{ __('Now that you have read about this product, please complete the product evaluation by clicking the button below.') }}
            </p>
            <a href="{{ route('posttest.show', ['productName' => $product]) }}"
                class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition-colors">
                {{ __('Complete Post-Test for') }} {{ ucfirst($product) }}
            </a>
        </div>
    </main>

    @stack('scripts')
    <x-floating-rating-button :product="$product" />
</body>

</html>
