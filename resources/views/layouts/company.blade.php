<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    @include('components.nav-company', [
        'logo'  => trim($__env->yieldContent('logo', 'Default Company')),
        'price' => trim($__env->yieldContent('price', '252')),
    ])

    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
