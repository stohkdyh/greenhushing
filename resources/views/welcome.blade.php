<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[url('C:\Users\ASUS\Herd\greenhushing\public\images\welcome_bg.jpg')] bg-no-repeat bg-center bg-cover text-[#1b1b18] flex items-center min-h-screen flex-col">
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
        class="bg-white bg-opacity-40 backdrop-blur-md flex items-center w-fit h-fit gap-3 px-4 py-2 mb-12 rounded-full border-white shadow-lg absolute top-8 z-10">
        <img src="{{ asset('images/logo_uny.png') }}" alt="Logo UNY" class="w-14 h-14">
        <img src="{{ asset('images/logo_nucb.png') }}" alt="Logo NUCB" class="w-14 h-14">
    </div>
    <x-languange-switch/>
    <div
        class="bg-white bg-opacity-40 backdrop-blur-md flex items-center justify-center w-[55%] transition-opacity opacity-100 duration-750 starting:opacity-0 rounded-3xl shadow-2xl p-8 my-auto">
        <div class="flex flex-col items-center justify-center w-full max-w-4xl">
            <h1 class="text-3xl lg:text-4xl font-bold mb-2 text-center">{{ __('Welcome') }}</h1>
            <p class="text-lg lg:text-xl text-center mb-3">{{ __('Complete Your Personal Data') }}</p>
            <form method="POST" action="{{ route('register') }}" class="w-full justify-center">
                <div class="w-full grid grid-cols-2 gap-6 px-12">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" placeholder="{{ __('Name') }}"
                            class="w-full" autocomplete="off" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Last Education')" />
                        <x-text-input id="name" name="name" type="text"
                            placeholder="{{ __('Last Education') }}" class="w-full" autocomplete="off" required
                            autofocus />
                        <x-input-error :messages="$errors->get('last_education')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Gender')" />
                        <x-text-input id="name" name="name" type="text" placeholder="{{ __('Gender') }}"
                            class="w-full" autocomplete="off" required autofocus />
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Domicile')" />
                        <x-text-input id="name" name="name" type="text" placeholder="{{ __('Domicile') }}"
                            class="w-full" autocomplete="off" required autofocus />
                        <x-input-error :messages="$errors->get('domicile')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Age')" />
                        <x-text-input id="name" name="name" type="text" placeholder="{{ __('Age') }}"
                            class="w-full" autocomplete="off" required autofocus />
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Monthly income')" />
                        <x-text-input id="name" name="name" type="text"
                            placeholder="{{ __('Monthly income') }}" class="w-full" autocomplete="off" required
                            autofocus />
                        <x-input-error :messages="$errors->get('monthly_income')" class="mt-2" />
                    </div>
                </div>
                {{-- <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button> --}}
            </form>
            <a href="{{ route('register') }}"
                class="inline-block mt-10 px-12 py-2 bg-[#303F8E] text-white rounded-3xl hover:bg-[#263272] transition-colors">
                {{ __('Login') }}
            </a>
        </div>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
