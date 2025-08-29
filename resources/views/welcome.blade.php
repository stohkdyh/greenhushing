<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-no-repeat bg-center bg-cover text-[#1b1b18] flex flex-col items-center min-h-screen"
    style="background-image: url('{{ asset('images/welcome_bg.jpg') }}');">

    <!-- Logo Top -->
    <div
        class="bg-white bg-opacity-50 backdrop-blur-md flex items-center gap-3 px-4 py-2 mb-12 rounded-full border-white shadow-lg absolute top-4 sm:top-8 z-10">
        <img src="{{ asset('images/logo_uny.png') }}" alt="Logo UNY" class="w-10 sm:w-14 h-10 sm:h-14">
        <img src="{{ asset('images/logo_nucb.png') }}" alt="Logo NUCB" class="w-10 sm:w-14 h-10 sm:h-14">
    </div>

    <!-- Language Switch -->
    <div class="bg-white bg-opacity-30 rounded-lg px-2 py-1 shadow-md backdrop-blur-md transition-all duration-300 absolute z-50 right-2 sm:right-10 top-6 sm:top-12" >
        <x-languange-switch/>
    </div>
    

    <!-- Form Container -->
    <div
        class="bg-white bg-opacity-50 backdrop-blur-md flex flex-col items-center justify-center w-[80%] sm:w-[80%] md:w-[60%] lg:w-[55%] rounded-3xl shadow-2xl p-6 sm:p-8 my-auto">
        <div class="flex flex-col items-center justify-center w-full max-w-4xl">

            <!-- Messages -->
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 w-full">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 w-full">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-2 text-center">{{ __('Welcome') }}</h1>
            <p class="text-base sm:text-lg lg:text-xl text-center mb-3">{{ __('Complete Your Personal Data') }}</p>

            <form action="{{ route('respondents.store') }}" method="POST" class="w-full">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 px-4 sm:px-12">
                    <div>
                        <x-input-label for="name" class="text-gray-100" :value="__('Name/Initial')" />
                        <x-text-input id="name" name="name" type="text" placeholder="{{ __('Name/Initial') }}"
                            class="w-full" autocomplete="off" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="age" class="text-gray-100" :value="__('Age')" />
                        <x-text-input id="age" name="age" type="number" min="1" placeholder="{{ __('Age') }}" class="w-full"
                            autocomplete="off" required />
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="gender" class="text-gray-100" :value="__('Gender')" />
                        <select id="gender" name="gender" required
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-50 border block w-full p-2 text-gray-500">
                            <option selected disabled>{{ __('Gender') }}</option>
                            <option value="Female" class="text-black">{{ __('Female') }}</option>
                            <option value="Male" class="text-black">{{ __('Male') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="country" class="text-gray-100" :value="__('Country')" />
                        <select id="country" name="country" required
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-50 border block w-full p-2 text-gray-500">
                            <option selected disabled>{{ __('Country') }}</option>
                            <option value="IDN" class="text-black">{{ __('Indonesia') }}</option>
                            <option value="JPN" class="text-black">{{ __('Japan') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                    </div>
                    <div class="col-span-1 sm:col-span-2">
                        <x-input-label for="last_education" :value="__('Last Education')" />
                        <select id="last_education" name="last_education" required
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-50 border block w-full p-2 text-gray-500">
                            <option selected disabled>{{ __('Last Education') }}</option>
                            <option value="senior_high" class="text-black">
                                {{ __('Senior High School / Vocational School') }}</option>
                            <option value="diploma" class="text-black">{{ __('Diploma (Associate Degree)') }}</option>
                            <option value="bachelor" class="text-black">{{ __("Bachelor's Degree") }}</option>
                            <option value="master" class="text-black">{{ __("Master's Degree") }}</option>
                            <option value="doctoral" class="text-black">{{ __('Doctoral Degree (Ph.D.)') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('last_education')" class="mt-2" />
                    </div>
                </div>

                <button type="submit"
                    class="mt-6 sm:mt-10 mx-auto block px-10 sm:px-12 py-2 bg-[#303F8E] text-white rounded-3xl hover:bg-[#263272] transition-colors">
                    {{ __('Submit') }}
                </button>
            </form>
        </div>
    </div>
</body>

</html>
