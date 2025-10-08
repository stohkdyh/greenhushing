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
            <div class="flex items-center gap-3 px-3 py-1 rounded-full">
                <img src="{{ asset('images/logo_uny.png') }}" alt="Logo UNY" class="w-11 h-11">
                <img src="{{ asset('images/logo_nucb.png') }}" alt="Logo NUCB" class="w-11 h-11">
            </div>
        </div>
    </header>

    <!-- Error / Success Message -->
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
                0/{{ count($questions) }} {{ __('answered') }}
            </span>
        </div>
        <div class="w-full bg-green-100 border border-green-200 rounded-full h-2 sm:h-3">
            <div id="progress-bar"
                class="bg-green-400 h-2 sm:h-3 rounded-full transition-all duration-500 ease-out"
                style="width: 0%"></div>
        </div>
    </div>

    <!-- Questions -->
    <main class="flex-1 w-11/12 sm:w-4/5 lg:w-1/2 mx-auto mt-4 sm:mt-6 space-y-4 sm:space-y-6">
        <form id="posttest-form" action="{{ route('posttest.store') }}" method="POST">
            @csrf
            @foreach ($questions as $key => $text)
                <div class="relative bg-white rounded-lg shadow-sm p-4 sm:p-6 mb-4 sm:mb-6 question-card border border-gray-200"
                    data-question="{{ $key }}">

                    <div class="-mt-3 mb-2 flex items-center gap-1">
                        <span class="text-sm sm:text-base font-semibold text-gray-700">
                            {{ __('Question') }} {{ $loop->iteration }}
                        </span>
                    </div>
                    <hr class="mb-2">

                    <!-- Teks pertanyaan dengan bintang di akhir -->
                    <p class="mt-2 mb-3 sm:mb-4 text-justify text-sm md:text-base font-medium">
                        {{ $text }} <span class="text-red-500">*</span>
                    </p>

                    <!-- Skala jawaban -->
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
        </form>
    </main>

    <!-- Submit Button -->
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

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const totalQuestions = {{ count($questions) }};
            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');
            const submitBtn = document.getElementById('submit-btn');
            const questionRadios = document.querySelectorAll('.question-radio');
            const form = document.getElementById('posttest-form');
            let answeredQuestions = new Set();

            // Cek jika ada radio yang sudah tercentang (misalnya reload halaman)
            questionRadios.forEach(radio => {
                if (radio.checked) answeredQuestions.add(radio.dataset.question);
            });

            function updateProgress() {
                const answeredCount = answeredQuestions.size;
                const progressPercentage = (answeredCount / totalQuestions) * 100;
                progressBar.style.width = progressPercentage + '%';
                progressText.textContent = `${answeredCount}/${totalQuestions} {{ __('answered') }}`;
                submitBtn.disabled = answeredCount !== totalQuestions;
                updateQuestionCards();
            }

            function updateQuestionCards() {
                document.querySelectorAll('.question-card').forEach(card => {
                    const qKey = card.dataset.question;
                    if (answeredQuestions.has(qKey)) {
                        card.classList.add('ring-1', 'ring-green-200', 'bg-green-50');
                        card.classList.remove('bg-white');
                    } else {
                        card.classList.remove('ring-1', 'ring-green-200', 'bg-green-50');
                        card.classList.add('bg-white');
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
