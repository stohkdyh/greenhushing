<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[url('C:\Users\ASUS\Herd\greenhushing\public\images\welcome_bg.jpg')] bg-no-repeat bg-center bg-cover text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    {{-- <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header> --}}
    <div
        class="bg-white bg-opacity-40 backdrop-blur-md flex items-center w-fit h-fit gap-6 px-5 py-3 rounded-full border-white border-[0.05rem]">
        <img src="{{ asset('images/logo_uny.png') }}" alt="Logo UNY" class="w-16 h-16 lg:w-20 lg:h-20">
        <img src="{{ asset('images/logo_nucb.png') }}" alt="Logo NUCB" class="w-16 h-16 lg:w-20 lg:h-20">
    </div>
    <div
        class="bg-white bg-opacity-40 backdrop-blur-md flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <div class="flex flex-col items-center justify-center w-full max-w-4xl">
            <h1 class="text-3xl lg:text-5xl font-bold mb-4 text-center">Welcome to GreenHushing</h1>
            <p class="text-lg lg:text-xl text-center mb-6">Your journey towards sustainable living starts here.</p>
            <a href="{{ route('login') }}"
                class="inline-block px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                Get Started
            </a>
        </div>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
