<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-image: url('{{ asset('images/welcome_bg.jpg') }}');"
    class="bg-no-repeat bg-center bg-cover text-[#1b1b18] flex items-center min-h-screen flex-col">
    <div
        class="bg-white bg-opacity-40 backdrop-blur-md flex items-center w-fit h-fit gap-3 px-4 py-2 mb-12 rounded-full border-white shadow-lg absolute top-8 z-10">
        <img src="{{ asset('images/logo_uny.png') }}" alt="Logo UNY" class="w-14 h-14">
        <img src="{{ asset('images/logo_nucb.png') }}" alt="Logo NUCB" class="w-14 h-14">
    </div>
    <x-languange-switch class="bg-white bg-opacity-30 rounded-lg shadow-md backdrop-blur-md transition-all duration-300 absolute z-50 right-10 top-12" />
    <div
        class="bg-white bg-opacity-40 backdrop-blur-md flex items-center justify-center w-[55%] transition-opacity opacity-100 duration-750 starting:opacity-0 rounded-3xl shadow-2xl p-8 my-auto">
        <div class="flex flex-col items-center justify-center w-full max-w-4xl">
            <h1 class="text-3xl lg:text-4xl font-bold mb-2 text-center">{{ __('Welcome') }}</h1>
            <p class="text-lg lg:text-xl text-center mb-3">{{ __('Complete Your Personal Data') }}</p>
            <form action="{{ route('respondents.store') }}" method="POST" class="w-full justify-center">
                <div class="w-full grid grid-cols-2 gap-6 px-12">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name/Initial')" />
                        <x-text-input id="name" name="name" type="text"
                            placeholder="{{ __('Name/Initial') }}" class="w-full" autocomplete="off" required
                            autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="age" :value="__('Age')" />
                        <x-text-input id="age" name="age" type="number"
                            placeholder="{{ __('Age') }}" class="w-full" autocomplete="off" required />
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="gender" :value="__('Gender')" />
                        <select id="gender" name="gender" required
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-50 border block w-full p-2 text-gray-500">
                            <option selected disabled>{{ __('Gender') }}</option>
                            <option value="Female" class="text-black">{{ __('Female') }}</option>
                            <option value="Male" class="text-black">{{ __('Male') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="country" :value="__('Country')" />
                        <select id="country" name="country" required
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-50 border block w-full p-2 text-gray-500">
                            <option selected disabled>{{ __('Country') }}</option>
                            <option value="IDN" class="text-black">{{ __('Indonesia') }}</option>
                            <option value="JPN" class="text-black">{{ __('Japan') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                    </div>
                    <div class="col-span-2">
                        <x-input-label for="last_education" :value="__('Last Education')" />
                        <select id="last_education" name="last_education" required
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-50 border block w-full p-2 text-gray-500">
                            <option selected disabled>{{ __('Last Education') }}</option>
                            <option value="senior_high" class="text-black">{{ __('Senior High School / Vocational School') }}</option>
                            <option value="diploma" class="text-black">{{ __('Diploma (Associate Degree)') }}</option>
                            <option value="bachelor" class="text-black">{{ __("Bachelor's Degree") }}</option>
                            <option value="master" class="text-black">{{ __("Master's Degree") }}</option>
                            <option value="doctoral" class="text-black">{{ __('Doctoral Degree (Ph.D.)') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('last_education')" class="mt-2" />
                    </div>
                </div>
                <button type="submit"
                    class="mt-10 mx-auto block px-12 py-2 bg-[#303F8E] text-white rounded-3xl hover:bg-[#263272] transition-colors">
                    {{ __('Submit') }}
                </button>
            </form>

        </div>
    </div>
</body>

</html>
