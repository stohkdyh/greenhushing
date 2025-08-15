<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen flex flex-col">

    <!-- Navbar -->
    <header
        class="flex fixed top-0 left-0 right-0 justify-between items-center px-14 py-2 bg-white bg-opacity-40 backdrop-blur-md shadow-md z-50">
        <div class="flex items-center gap-8">
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
    <div class="w-11/12 sm:w-4/5 lg:w-1/2 mx-auto mt-[100px]">
        <div class="flex justify-between items-center mb-1 sm:mb-2">
            <span class="text-xs sm:text-sm text-gray-600">{{ __('Progress') }}</span>
            <span id="progress-text" class="text-xs sm:text-sm text-gray-600">0/7 {{ __('answered') }}</span>
        </div>
        <div class="w-full bg-green-100 border border-green-200 rounded-full h-2 sm:h-3">
            <div id="progress-bar" class="bg-green-400 h-2 sm:h-3 rounded-full transition-all duration-500 ease-out"
                style="width: 0%"></div>
        </div>
    </div>

    <!-- Card Questions -->
    <main class="flex-1 w-11/12 sm:w-4/5 lg:w-1/2 mx-auto mt-4 sm:mt-6 space-y-4 sm:space-y-6">
        <form id="pretest-form" action="{{ route('pretest.store') }}" method="POST">
            @csrf
            @for ($i = 1; $i <= 7; $i++)
                <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 mb-4 sm:mb-6 question-card border border-gray-200"
                    data-question="{{ $i }}">
                    <p class="mb-3 sm:mb-4 text-center text-sm sm:text-base font-medium">
                        {{ __('Question') }} {{ $i }}:
                        {{ __('You feel that this product\'s environmental reputation is generally reliable') }}
                    </p>
                    <div class="flex items-center justify-between gap-2 sm:gap-4">
                        <span class="text-[10px] sm:text-xs text-gray-500 text-center w-12 sm:w-16 leading-tight">
                            {{ __('Strongly') }}<br>{{ __('Disagree') }}
                        </span>
                        <div class="flex space-x-4 sm:space-x-7">
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
                                    class="w-5 h-5 sm:w-6 sm:h-6 question-radio cursor-pointer hover:scale-110 transition-transform"
                                    style="color: {{ $colors[$value] }}; --tw-ring-color: {{ $colors[$value] }};"
                                    data-question="{{ $i }}">
                            @endfor
                        </div>
                        <span class="text-[10px] sm:text-xs text-gray-500 text-center w-12 sm:w-16 leading-tight">
                            {{ __('Strongly') }}<br>{{ __('Agree') }}
                        </span>
                    </div>
                </div>
            @endfor
        </form>
    </main>

    <!-- Submit button -->
    <div class="w-11/12 sm:w-4/5 lg:w-1/2 mx-auto my-4 sm:my-6 text-center sm:text-right">
        <button id="submit-btn"
            class="bg-green-600 text-white px-6 py-2.5 rounded-lg font-medium 
                hover:bg-green-500 focus:ring-2 focus:ring-green-400 focus:outline-none 
                disabled:bg-gray-300 disabled:text-gray-600 disabled:cursor-not-allowed
                transition-all duration-300 ease-in-out"
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
                        questionCard.classList.add('ring-1', 'ring-blue-200', 'bg-blue-50');
                        questionCard.classList.remove('bg-white');
                    } else {
                        questionCard.classList.remove('ring-1', 'ring-blue-200', 'bg-blue-50');
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
