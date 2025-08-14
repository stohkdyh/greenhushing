<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f3f7f0] min-h-screen flex flex-col">

    <!-- Navbar -->
    <header
        class="flex fixed top-0 left-0 right-0 justify-between items-center px-14 py-2 bg-white bg-opacity-40 backdrop-blur-md shadow-md z-50">
        <!-- Kiri: Hamburger + Title -->
        <div class="flex items-center gap-8">
            <button class="p-2">
                <!-- Hamburger icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h1 class="font-bold text-xl">{{ __('Post-Test') }}</h1>
        </div>

        <!-- Kanan: Logo + Language Switch -->
        <div class="flex items-center gap-4">
            <x-languange-switch class="h-full px-0" />
            <div class="flex items-center gap-3  px-3 py-1 rounded-full">
                <img src="{{ asset('images/logo_uny.png') }}" alt="Logo UNY" class="w-11 h-11">
                <img src="{{ asset('images/logo_nucb.png') }}" alt="Logo NUCB" class="w-11 h-11">
            </div>
        </div>
    </header>

    <!-- Add error/success messages -->
    @if (session('error'))
        <div class="w-11/12 md:w-1/2 mx-auto mt-[110px] mb-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        </div>
    @endif

    @if (session('success'))
        <div class="w-11/12 md:w-1/2 mx-auto mt-[110px] mb-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Progress bar -->
    <div class="w-11/12 md:w-1/2 mx-auto mt-[110px]">
        <div class="flex justify-between items-center mb-2">
            <span class="text-sm text-gray-600">{{ __('Progress') }}</span>
            <span id="progress-text" class="text-sm text-gray-600">0/7 {{ __('answered') }}</span>
        </div>
        <div class="w-full bg-blue-200 rounded-full h-3">
            <div id="progress-bar" class="bg-blue-700 h-3 rounded-full transition-all duration-500 ease-out"
                style="width: 0%"></div>
        </div>
    </div>

    <!-- Card Questions -->
    <main class="flex-1 w-11/12 md:w-1/2 mx-auto mt-6 space-y-6">
        <form id="posttest-form" action="{{ route('posttest.store') }}" method="POST">
            @csrf
            @for ($i = 1; $i <= 7; $i++)
                <div class="bg-white rounded-lg shadow-md p-6 question-card mb-6" data-question="{{ $i }}">
                    <p class="mb-4 text-center font-medium">
                        {{ __('Question') }} {{ $i }}:
                        {{ __('You feel that this product\'s environmental reputation is generally reliable') }}
                    </p>
                    <div class="flex items-center justify-between mx-6">
                        <span class="text-sm text-gray-500 text-center w-16 leading-tight">
                            {{ __('Strongly') }}<br>{{ __('Disagree') }}
                        </span>
                        <div class="flex space-x-7">
                            @for ($value = 1; $value <= 7; $value++)
                                @php
                                    $colors = [
                                        1 => '#FF877B',
                                        2 => '#FFCDAD',
                                        3 => '#FCDCB0',
                                        4 => '#F5E5B4',
                                        5 => '#E7EDBC',
                                        6 => '#CEE5B1',
                                        7 => '#6FB171',
                                    ];
                                @endphp
                                <input type="radio" name="q{{ $i }}" value="{{ $value }}"
                                    class="w-6 h-6 question-radio cursor-pointer hover:scale-110 transition-transform"
                                    style="color: {{ $colors[$value] }}; --tw-ring-color: {{ $colors[$value] }};"
                                    data-question="{{ $i }}">
                            @endfor
                        </div>
                        <span class="text-sm text-gray-500 text-center w-16 leading-tight">
                            {{ __('Strongly') }}<br>{{ __('Agree') }}
                        </span>
                    </div>
                    @error('q' . $i)
                        <div class="text-red-500 text-sm mt-2 text-center">{{ $message }}</div>
                    @enderror
                </div>
            @endfor
        </form>
    </main>

    <!-- Submit button -->
    <div class="w-11/12 md:w-1/2 mx-auto my-6 text-right">
        <button id="submit-btn"
            class="bg-blue-700 text-white px-6 py-2 rounded-full shadow-md hover:bg-blue-600 disabled:bg-gray-400 disabled:cursor-not-allowed transition-colors"
            disabled>
            {{ __('Submit') }}
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const totalQuestions = 7;
            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');
            const submitBtn = document.getElementById('submit-btn');
            const questionRadios = document.querySelectorAll('.question-radio');
            const form = document.getElementById('posttest-form');

            let answeredQuestions = new Set();

            // Function to update progress
            function updateProgress() {
                const answeredCount = answeredQuestions.size;
                const progressPercentage = (answeredCount / totalQuestions) * 100;

                // Update progress bar
                progressBar.style.width = progressPercentage + '%';

                // Update progress text
                progressText.textContent = `${answeredCount}/${totalQuestions} {{ __('answered') }}`;

                // Enable/disable submit button
                if (answeredCount === totalQuestions) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('disabled:bg-gray-400', 'disabled:cursor-not-allowed');
                    submitBtn.classList.add('hover:bg-blue-600');
                } else {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('disabled:bg-gray-400', 'disabled:cursor-not-allowed');
                    submitBtn.classList.remove('hover:bg-blue-600');
                }

                // Add visual feedback for completed questions
                updateQuestionCards();
            }

            // Function to update question card appearance
            function updateQuestionCards() {
                for (let i = 1; i <= totalQuestions; i++) {
                    const questionCard = document.querySelector(`[data-question="${i}"]`);
                    if (answeredQuestions.has(i)) {
                        questionCard.classList.add('ring-2', 'ring-blue-300', 'bg-blue-50');
                        questionCard.classList.remove('bg-white');
                    } else {
                        questionCard.classList.remove('ring-2', 'ring-blue-300', 'bg-blue-50');
                        questionCard.classList.add('bg-white');
                    }
                }
            }

            // Add event listeners to all radio buttons
            questionRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const questionNumber = parseInt(this.dataset.question);

                    if (this.checked) {
                        answeredQuestions.add(questionNumber);
                    }

                    updateProgress();
                });
            });

            // Handle form submission
            submitBtn.addEventListener('click', function(e) {
                e.preventDefault();

                if (answeredQuestions.size === totalQuestions) {
                    // Show loading state
                    submitBtn.disabled = true;
                    submitBtn.textContent = '{{ __('Submitting...') }}';

                    // Submit the form
                    form.submit();
                } else {
                    alert('{{ __('Please answer all questions before submitting.') }}');
                }
            });

            // Initialize progress
            updateProgress();
        });
    </script>

</body>

</html>
