<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>{{ config('app.name', 'Laravel') }} - Enter Access Code</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex flex-col items-center">
    <main class="container mx-auto px-4 flex-grow flex flex-col items-center justify-center max-w-md">
        <!-- Card -->
        <div class="bg-white rounded-lg shadow-md p-6 w-full">
            <h2 class="text-2xl font-bold text-center mb-1">Enter Access Code</h2>
            <p class="text-gray-600 text-center text-sm mb-8">
                Please enter the access code provided by the researcher.
            </p>

            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded-md mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('product.type.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <div class="relative">
                        <input type="text" id="access_code" name="access_code" required
                            class="block w-full px-4 py-3 text-lg text-center font-bold tracking-widest uppercase border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('access_code') border-red-500 @enderror"
                            placeholder="ENTER CODE">
                    </div>
                    @error('access_code')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-8 flex justify-center">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg 
                        transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-lg">
                        Continue
                    </button>
                </div>
            </form>
        </div>

        {{-- <div class="mt-6 text-center text-sm text-gray-500">
            <p>If you don't have an access code, please contact the researcher.</p>
        </div> --}}
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-focus the access code input
            document.getElementById('access_code').focus();

            // Auto-uppercase the input
            document.getElementById('access_code').addEventListener('input', function() {
                this.value = this.value.toUpperCase();
            });
        });
    </script>
</body>

</html>
