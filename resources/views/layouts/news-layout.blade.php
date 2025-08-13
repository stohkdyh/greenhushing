<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title', config('app.name', 'TERRANEWS'))</title>
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
    </main>

    @stack('scripts')
</body>
</html>
