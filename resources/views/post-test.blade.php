<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>{{ config('app.name', 'Laravel') }} - {{ $displayName }} Post Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen flex flex-col">
    <!-- Navbar -->
    <header
        class="flex fixed top-0 left-0 right-0 justify-between items-center 
            px-6 sm:px-14 py-2 bg-white bg-opacity-40 backdrop-blur-md 
            shadow-md z-50">
        <div class="flex items-center gap-6 sm:gap-8">
            <h1 class="font-bold text-base sm:text-xl">
                {{ __('Post-Test') }}: {{ $displayName }}
            </h1>
        </div>

        <!-- Kanan: Logo + Language Switch -->
        <div class="flex items-center gap-4">
            <x-languange-switch class="h-full px-0" />
            <div class="flex items-center gap-2 sm:gap-3 px-2 sm:px-3 py-1 rounded-full">
                <img src="{{ asset('images/logo_uny.png') }}" 
                    alt="Logo UNY" 
                    class="w-8 h-8 sm:w-11 sm:h-11 transition-all duration-200">
                <img src="{{ asset('images/logo_nucb.png') }}" 
                    alt="Logo NUCB" 
                    class="w-8 h-8 sm:w-11 sm:h-11 transition-all duration-200">
            </div>
        </div>
    </header>

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

    <!-- Progress Bar -->
    <div class="w-11/12 sm:w-4/5 lg:w-1/2 mx-auto mt-[100px]">
        <div class="flex justify-between items-center mb-1 sm:mb-2">
            <span class="text-xs sm:text-sm text-gray-600">{{ __('Progress') }}</span>
            <span id="progress-text" class="text-xs sm:text-sm text-gray-600">
                0/<span id="total-questions"></span> {{ __('answered') }}
            </span>
        </div>
        <div class="w-full bg-green-100 border border-green-200 rounded-full h-2 sm:h-3">
            <div id="progress-bar"
                class="bg-green-400 h-2 sm:h-3 rounded-full transition-all duration-500 ease-out"
                style="width: 0%"></div>
        </div>
    </div>

    <!-- Questions -->
    <main class="flex-1 w-11/12 sm:w-4/5 lg:w-1/2 mx-auto mt-4 sm:mt-6 space-y-4 sm:space-y-6 pb-10">
        <form id="posttest-form" action="{{ route('posttest.store', ['productName' => $productName]) }}" method="POST">
            @csrf

            @if(isset($questions['manipulation']))
            <div class="mb-8">
                <h2 class="text-lg font-bold text-purple-800 mb-4 border-b pb-2">{{ __('Product Perception Questions') }}</h2>

                @foreach($questions['manipulation'] as $key => $text)
                <div class="relative bg-purple-50 rounded-lg shadow-sm p-4 sm:p-6 mb-4 sm:mb-6 question-card border border-purple-200"
                    data-question="{{ $key }}">
                    <div class="-mt-3 mb-2 flex items-center gap-1">
                        <span class="text-sm sm:text-base font-semibold text-purple-700">
                            {{ __('Question') }} {{ $loop->iteration }}
                        </span>
                    </div>
                    <hr class="mb-2 border-purple-200">

                    <p class="mt-2 mb-3 sm:mb-4 text-justify text-sm md:text-base font-medium">
                        {{ $text }} <span class="text-red-500">*</span>
                    </p>

                    <div class="flex gap-4 justify-center">
                        <label class="inline-flex items-center">
                            <input type="radio" name="{{ $key }}" value="yes"
                                class="w-5 h-5 question-radio cursor-pointer"
                                data-question="{{ $key }}" required>
                            <span class="ml-2 text-purple-900">{{ __('Yes') }}</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="{{ $key }}" value="no"
                                class="w-5 h-5 question-radio cursor-pointer"
                                data-question="{{ $key }}" required>
                            <span class="ml-2 text-purple-900">{{ __('No') }}</span>
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <div class="mb-8">
                <h2 class="text-lg font-bold text-green-800 mb-4 border-b pb-2">{{ __('Product Evaluation Questions') }}</h2>

                @foreach($questions['post_test'] as $key => $text)
                <div class="relative bg-white rounded-lg shadow-sm p-4 sm:p-6 mb-4 sm:mb-6 question-card border border-gray-200"
                    data-question="{{ $key }}">

                    <div class="-mt-3 mb-2 flex items-center gap-1">
                        <span class="text-sm sm:text-base font-semibold text-gray-700">
                            {{ __('Question') }} {{ $loop->iteration }}
                        </span>
                    </div>
                    <hr class="mb-2">

                    <p class="mt-2 mb-3 sm:mb-4 text-justify text-sm md:text-base font-medium">
                        {{ $text }} <span class="text-red-500">*</span>
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
                                <input type="radio" name="{{ $key }}" value="{{ $value }}"
                                    class="w-5 h-5 sm:w-6 sm:h-6 question-radio cursor-pointer hover:scale-110 transition-transform"
                                    style="color: {{ $colors[$value] }}; --tw-ring-color: {{ $colors[$value] }};"
                                    data-question="{{ $key }}" required>
                            @endfor
                        </div>

                        <span class="text-[10px] sm:text-xs text-gray-500 text-center w-12 sm:w-16 leading-tight">
                            {{ __('Strongly') }}<br>{{ __('Agree') }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mb-8">
                <h2 class="text-lg font-bold text-blue-800 mb-4 border-b pb-2">{{ __('Purchase Intention') }}</h2>
                <div class="bg-blue-50 p-4 rounded-lg mb-6 border border-blue-200 question-card" data-question="intention_to_buy">
                    <p class="mt-2 mb-3 sm:mb-4 text-justify text-sm md:text-base font-medium">
                        {{ $questions['intention_to_buy'] }} <span class="text-red-500">*</span>
                    </p>

                    <div>
                        <div class="flex justify-between text-xs text-gray-500 mb-2">
                            <span>{{ __('Very Unlikely') }}</span>
                            <span>{{ __('Very Likely') }}</span>
                        </div>
                        <div class="grid grid-cols-10 gap-2">
                            @for ($i = 1; $i <= 10; $i++)
                                <div class="flex justify-center">
                                    <input type="radio" name="intention_to_buy" value="{{ $i }}"
                                        class="w-5 h-5 sm:w-6 sm:h-6 question-radio cursor-pointer hover:scale-110 transition-transform"
                                        data-question="intention_to_buy" required>
                                </div>
                            @endfor
                        </div>
                        <div class="grid grid-cols-10 gap-2 mt-1">
                            @for ($i = 1; $i <= 10; $i++)
                                <div class="text-center text-xs">{{ $i }}</div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <!-- Submit Button -->
    <div class="sticky bottom-0 left-0 right-0 bg-white bg-opacity-90 backdrop-blur-md py-4 border-t border-gray-200 shadow-md">
        <div class="w-11/12 sm:w-4/5 lg:w-1/2 mx-auto flex justify-between items-center">
            <div>
                <span id="questions-remaining" class="text-sm font-medium text-gray-700"></span>
            </div>
            <button id="submit-btn"
                class="bg-green-600 text-white px-6 py-2.5 rounded-lg font-medium 
                    hover:bg-green-500 focus:ring-2 focus:ring-green-400 focus:outline-none 
                    disabled:bg-gray-300 disabled:text-gray-600 disabled:cursor-not-allowed
                    transition-all duration-300 ease-in-out"
                disabled>
                {{ __('Submit') }}
            </button>
        </div>
    </div>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('posttest-form');
            const questionRadios = document.querySelectorAll('.question-radio');
            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');
            const submitBtn = document.getElementById('submit-btn');
            const questionsRemaining = document.getElementById('questions-remaining');
            const totalQuestionsSpan = document.getElementById('total-questions');

            let answeredQuestions = new Set();
            const totalQuestions = document.querySelectorAll('.question-card').length;

            // Set total questions count
            totalQuestionsSpan.textContent = totalQuestions;

            // Check for already answered questions (e.g., on page reload)
            questionRadios.forEach(radio => {
                if (radio.checked) answeredQuestions.add(radio.dataset.question);
            });

            function updateProgress() {
                const answeredCount = answeredQuestions.size;
                const progressPercentage = (answeredCount / totalQuestions) * 100;
                const remaining = totalQuestions - answeredCount;

                progressBar.style.width = progressPercentage + '%';
                progressText.textContent = `${answeredCount}/${totalQuestions} {{ __('answered') }}`;

                if (remaining === 0) {
                    questionsRemaining.textContent = '{{ __("All questions answered!") }}';
                    questionsRemaining.className = 'text-sm font-medium text-green-700';
                } else {
                    questionsRemaining.textContent = `{{ __("Questions remaining:") }} ${remaining}`;
                    questionsRemaining.className = 'text-sm font-medium text-gray-700';
                }

                submitBtn.disabled = answeredCount !== totalQuestions;
                updateQuestionCards();
            }

            function updateQuestionCards() {
                document.querySelectorAll('.question-card').forEach(card => {
                    const qKey = card.dataset.question;
                    if (answeredQuestions.has(qKey)) {
                        if (card.classList.contains('bg-purple-50')) {
                            card.classList.add('ring-1', 'ring-purple-300', 'bg-purple-100');
                            card.classList.remove('bg-purple-50');
                        } else if (card.classList.contains('bg-blue-50')) {
                            card.classList.add('ring-1', 'ring-blue-300', 'bg-blue-100');
                            card.classList.remove('bg-blue-50');
                        } else {
                            card.classList.add('ring-1', 'ring-green-200', 'bg-green-50');
                            card.classList.remove('bg-white');
                        }
                    } else {
                        if (card.classList.contains('bg-purple-50')) {
                            card.classList.remove('ring-1', 'ring-purple-300', 'bg-purple-100');
                        } else if (card.classList.contains('bg-blue-50')) {
                            card.classList.remove('ring-1', 'ring-blue-300', 'bg-blue-100');
                        } else {
                            card.classList.remove('ring-1', 'ring-green-200', 'bg-green-50');
                            card.classList.add('bg-white');
                        }
                    }
                });
            }

            questionRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    answeredQuestions.add(this.dataset.question);
                    updateProgress();
                });
            });

            submitBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (answeredQuestions.size === totalQuestions) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML =
                        '{{ __('Submitting...') }} <span class="ml-1 inline-block animate-spin">⟳</span>';
                    form.submit();
                } else {
                    alert('{{ __('Please answer all questions before submitting.') }}');
                    document.querySelectorAll('.question-card').forEach(card => {
                        const qKey = card.dataset.question;
                        if (!answeredQuestions.has(qKey)) {
                            card.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            card.classList.add('ring-2', 'ring-red-300', 'animate-pulse');
                            setTimeout(() => {
                                card.classList.remove('ring-2', 'ring-red-300', 'animate-pulse');
                            }, 1500);
                        }
                    });
                }
            });

            updateProgress();
        });
    </script>
</body>
</html>
