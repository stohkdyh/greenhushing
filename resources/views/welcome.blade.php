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
    <div class="fixed right-2 sm:right-10 top-6 sm:top-12 bg-white bg-opacity-30 rounded-lg px-2 py-1 shadow-md z-50">
        <x-languange-switch />
    </div>

    <!-- Modal Multi-Page Consent -->
    <div id="consentModal" class="fixed inset-0 flex items-center justify-center z-40 pointer-events-none">
        <div class="absolute inset-0 bg-black bg-opacity-40 backdrop-blur-sm"></div>
        <div
            class="relative bg-white rounded-3xl shadow-2xl w-[90%] sm:w-[70%] md:w-[50%] max-h-[80vh] overflow-hidden pointer-events-auto flex flex-col z-50">
            <div id="modalPages" class="flex-1 overflow-y-auto scroll-smooth px-6 py-4">

                <!-- Page 1: Welcome -->
                <div class="modal-page flex flex-col items-center">
                    <div class="flex justify-center mb-4">
                        @include('components.icon.check-circle')
                    </div>
                    <h2 class="text-2xl font-bold mb-4 text-[#303F8E]">{{ __('Participant Consent Form') }} </h2>
                    <p class="text-gray-700 text-sm sm:text-base md:text-lg leading-relaxed mb-6 px-5 text-justify">
                        {!! nl2br(e(__('Permission'))) !!}
                    </p>
                </div>

                <!-- Page 2: Instruction -->
                <div class="modal-page hidden flex flex-col">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-[#303F8E]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 6v.01M4 12v.01M20 12v.01M12 20v.01M4 4l16 16" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold mb-4 text-center text-[#303F8E]">{{ __('Instruction') }}</h2>
                    <!-- Deskripsi Singkat -->
                    <p class="text-gray-700 text-center whitespace-pre-line text-base sm:text-lg">
                        {{ __('InstructionDesc') }}
                    </p>
                    <!-- Instruksi Lengkap -->
                    <p class="text-gray-700 whitespace-pre-line text-base sm:text-lg mt-4">
                        {{ __('InstructionText') }}
                    </p>
                    <div class="flex justify-center items-center text-center gap-10 mb-5 font">
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('images/logo_palsu.png') }}" alt="Logo A"
                                class="w-24 h-24 object-contain mb-2">
                            <span>{!! nl2br(e(__('Authentic logo Logo A'))) !!}</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('images/logoclaimzeno.png') }}" alt="Logo B"
                                class="w-24 h-24 object-contain mb-2">
                            <span>{!! nl2br(e(__('Non-authentic logo Logo B'))) !!}</span>
                        </div>
                    </div>
                    <!-- Checkbox Finish -->
                    <div class="mt-6 flex flex-col" id="checkboxContainer">
                        <label class="flex items-center gap-3 text-gray-700">
                            <input type="checkbox" id="instructionCheck" class="w-5 h-5 accent-[#303F8E] rounded">
                            {{ __('I have read and understood the instructions') }}
                        </label>
                        <p id="checkboxWarning" class="text-red-600 text-sm mt-2 hidden">
                            {{ __('Please check the box to enable Finish.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-end mt-4 gap-3 px-6 py-4 border-t border-gray-200">
                <button id="btnPrev"
                    class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-all hidden">
                    {{ __('Prev') }}
                </button>
                <button id="btnNext"
                    class="px-6 py-2 bg-[#303F8E] text-white rounded-lg hover:bg-[#263272] transition-all flex items-center gap-2">
                    {{ __('I Agree') }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
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
                        <x-input-label for="name" class="text-gray-600" :value="__('Name/Initial')" />
                        <x-text-input id="name" name="name" type="text"
                            placeholder="{{ __('Name/Initial') }}" class="w-full" autocomplete="off" required
                            autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="age" class="text-gray-600" :value="__('Age')" />
                        <x-text-input id="age" name="age" type="number" min="1"
                            placeholder="{{ __('Age') }}" class="w-full" autocomplete="off" required />
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="gender" class="text-gray-600" :value="__('Gender')" />
                        <select id="gender" name="gender" required
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-50 border block w-full p-2 text-gray-500">
                            <option selected disabled>{{ __('Gender') }}</option>
                            <option value="Female" class="text-black">{{ __('Female') }}</option>
                            <option value="Male" class="text-black">{{ __('Male') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="country" class="text-gray-600" :value="__('Country')" />
                        <select id="country" name="country" required
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-50 border block w-full p-2 text-gray-500">
                            <option selected disabled>{{ __('Country') }}</option>
                            <option value="IDN" class="text-black">{{ __('Indonesia') }}</option>
                            <option value="JPN" class="text-black">{{ __('Japan') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="GPA" class="text-gray-600" :value="__('GPA')" />
                        <x-text-input id="GPA" name="GPA" type="number" step="0.01" min="0"
                            max="4" placeholder="{{ __('GPA') }}" class="w-full" autocomplete="off"
                            required />
                        <x-input-error :messages="$errors->get('GPA')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="work_experience" class="text-gray-600" :value="__('Work Experience')" />
                        <select id="work_experience" name="work_experience" required
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-50 border block w-full p-2 text-gray-500">
                            <option selected disabled>{{ __('Work Experience') }}</option>
                            <option value="none" class="text-black">{{ __('No Experience') }}</option>
                            <option value="<6_months" class="text-black">{{ __('Less than 6 months') }}</option>
                            <option value="6-12_months" class="text-black">{{ __('6-12 months') }}</option>
                            <option value="1-2_years" class="text-black">{{ __('1-2 years') }}</option>
                            <option value=">2_years" class="text-black">{{ __('More than 2 years') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('work_experience')" class="mt-2" />
                    </div>
                    <div class="col-span-1 sm:col-span-2">
                        <x-input-label for="last_education" class="text-gray-600" :value="__('Last Education')" />
                        <select id="last_education" name="last_education" required
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-50 border block w-full p-2 text-gray-500">
                            <option selected disabled>{{ __('Last Education') }}</option>
                            <option value="senior_high" class="text-black">
                                {{ __('Senior High School / Vocational School') }}</option>
                            <option value="diploma" class="text-black">{{ __('Diploma (Associate Degree)') }}
                            </option>
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



    <script>
        const modal = document.getElementById('consentModal');
        const formContainer = document.getElementById('formContainer');

        const pages = document.querySelectorAll('.modal-page');
        const btnNext = document.getElementById('btnNext');
        const btnPrev = document.getElementById('btnPrev');
        let currentPage = 0;

        function showPage(index) {
            pages.forEach((page, i) => page.classList.toggle('hidden', i !== index));
            pages[index].scrollTop = 0;
            // btnPrev.classList.toggle('hidden', index === 0);

            if (index === pages.length - 1) {
                const checkbox = document.getElementById('instructionCheck');
                const warning = document.getElementById('checkboxWarning');

                btnNext.textContent = '{{ __('Finish') }}';

                // tombol Finish
                btnNext.onclick = () => {
                    if (!checkbox.checked) {
                        warning.classList.remove('hidden');
                        warning.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                        setTimeout(() => {
                            warning.classList.remove('opacity-0');
                        }, 10);
                        return;
                    }
                    modal.classList.add('hidden');
                    formContainer.classList.remove('hidden');
                };

                // sembunyikan warning saat dicentang
                checkbox.addEventListener('change', () => {
                    if (checkbox.checked) {
                        warning.classList.add('hidden');
                    }
                });
            } else {
                btnNext.textContent = '{{ __('I Agree') }}';
                btnNext.onclick = nextPage;
            }
        }

        function nextPage() {
            if (currentPage < pages.length - 1) currentPage++;
            showPage(currentPage);
        }

        function prevPage() {
            if (currentPage > 0) currentPage--;
            showPage(currentPage);
        }

        btnPrev.onclick = prevPage;

        // tampilkan halaman pertama saat modal muncul
        showPage(currentPage);
    </script>

</body>

</html>
