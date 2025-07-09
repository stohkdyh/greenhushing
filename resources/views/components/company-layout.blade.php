@props(['logo' => 'Default Company'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    @include('layouts.nav-company', ['logo' => $logo])

    <main>
        {{ $slot }}
    </main>
    @stack('scripts')
</body>
</html>
