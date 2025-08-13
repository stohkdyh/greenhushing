<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>
    @include('components.nav-company', [
        'logo' => trim($__env->yieldContent('logo', 'Default Company')),
        'price' => trim($__env->yieldContent('price', '252')),
    ])

    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>

</html>
