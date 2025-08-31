<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>{{ __('Thank You') }} - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-image: url('{{ asset('images/welcome_bg.jpg') }}');"
    class="bg-repeat bg-center bg-contain text-[#1b1b18] flex items-center min-h-screen flex-col px-4">

    <!-- Logo Header -->
    <div
        class="bg-white bg-opacity-40 backdrop-blur-md flex items-center gap-3 px-3 sm:px-4 py-2 mb-8 sm:mb-12 rounded-full border-white shadow-lg sticky top-4 sm:top-8 z-10">
        <img src="{{ asset('images/logo_uny.png') }}" alt="Logo UNY" class="w-10 h-10 sm:w-14 sm:h-14">
        <img src="{{ asset('images/logo_nucb.png') }}" alt="Logo NUCB" class="w-10 h-10 sm:w-14 sm:h-14">
    </div>

    <!-- Language Switch -->
    <x-languange-switch
        class="bg-white bg-opacity-30 rounded-lg shadow-md backdrop-blur-md transition-all duration-300 absolute z-50 right-4 sm:right-10 top-4 sm:top-12" />

    <!-- Main Content -->
    <div
        class="bg-white bg-opacity-70 backdrop-blur-md flex items-center justify-center w-full sm:w-[85%] md:w-[70%] lg:w-[65%] max-w-4xl transition-opacity opacity-100 duration-750 starting:opacity-0 rounded-2xl sm:rounded-3xl shadow-2xl px-4 sm:px-8 md:px-12 py-8 sm:py-12 my-16 sm:my-24 md:my-32 relative">
        <div class="flex flex-col items-center justify-center w-full text-center">

            <!-- Success Icon -->
            <div class="mb-6 sm:mb-8 mt-6 sm:mt-10">
                <div
                    class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 animate-pulse">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8 sm:h-10 sm:w-10 md:h-12 md:w-12 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            <!-- Thank You Message -->
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-3 sm:mb-4 text-green-700">
                {{ __('Thank You!') }}
            </h1>

            <h2 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-semibold mb-4 sm:mb-6 text-gray-800">
                {{ __('Survey Completed Successfully') }}
            </h2>

            <!-- Appreciation Message -->
            <div class="space-y-3 sm:space-y-4 mb-6 sm:mb-8 max-w-2xl px-2 sm:px-0">
                <p class="text-base sm:text-lg md:text-xl text-gray-700 leading-relaxed">
                    {{ __('We sincerely appreciate your time and valuable responses in our research study about environmental sustainability and consumer behavior.') }}
                </p>

                <p class="text-base sm:text-lg md:text-xl text-gray-700">
                    {{ __('Your participation contributes to better understanding of sustainable consumer practices and helps advance academic research in this important field.') }}
                </p>
            </div>

            <!-- Completion Summary -->
            <div class="w-full max-w-md sm:max-w-[500px] bg-white bg-opacity-60 rounded-xl sm:rounded-2xl p-4 sm:p-6 mb-6 sm:mb-8 text-left">
                <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4">{{ __('Completion Summary') }}</h3>
                <div class="space-y-1 sm:space-y-2 text-xs sm:text-sm text-gray-700">
                    <div class="flex justify-between">
                        <span>{{ __('Profile Setup:') }}</span>
                        <span class="text-green-600 font-semibold">✓ {{ __('Complete') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>{{ __('Pre-test:') }}</span>
                        <span class="text-green-600 font-semibold">✓ {{ __('Complete') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>{{ __('Market Exploration:') }}</span>
                        <span class="text-green-600 font-semibold">✓ {{ __('Complete') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>{{ __('Post-test:') }}</span>
                        <span class="text-green-600 font-semibold">✓ {{ __('Complete') }}</span>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-blue-50 bg-opacity-80 rounded-lg sm:rounded-xl p-4 sm:p-6 w-full max-w-md sm:max-w-[500px] text-left">
                <h3 class="text-base sm:text-lg font-semibold text-blue-800 mb-2 sm:mb-3">{{ __('Questions or Concerns?') }}</h3>
                <p class="text-xs sm:text-sm text-blue-700 mb-2">
                    {{ __('If you have any questions about this research or would like to receive the results, please contact:') }}
                </p>
                <div class="text-xs sm:text-sm text-blue-800 space-y-1">
                    <p><strong>{{ __('Research Team') }}</strong></p>
                    <p>{{ __('Universitas Negeri Yogyakarta (UNY)') }}</p>
                    <p>{{ __('Nagoya University of Commerce & Business (NUCB)') }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-6 sm:mt-8 w-full max-w-md">
                <button onclick="window.print()"
                    class="px-4 sm:px-6 py-2 sm:py-3 bg-blue-800 text-white rounded-full hover:bg-blue-600 transition-colors shadow-lg text-sm sm:text-base">
                    {{ __('Print Certificate') }}
                </button>

                <a href="{{ route('welcome') }}"
                    class="px-4 sm:px-6 py-2 sm:py-3 bg-gray-600 text-white rounded-full hover:bg-gray-700 transition-colors shadow-lg text-center text-sm sm:text-base">
                    {{ __('Start New Survey') }}
                </a>
            </div>

            <!-- Participant ID Display -->
            @if (session('respondent_id'))
                <div class="mt-4 sm:mt-6 p-2 sm:p-3 bg-gray-100 bg-opacity-80 rounded-lg">
                    <p class="text-[10px] sm:text-xs text-gray-600">
                        {{ __('Participant ID:') }} <span
                            class="font-mono font-semibold">{{ session('respondent_id') }}</span>
                    </p>
                </div>
            @endif

        </div>
    </div>

    <!-- Floating Animation -->
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }

        @media print {
            body { background: white !important; }
            .no-print { display: none !important; }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successIcon = document.querySelector('.bg-green-500');
            if (successIcon) successIcon.classList.add('animate-float');

            setTimeout(function() {
                const participantId = document.querySelector('.font-mono');
                if (participantId) {
                    participantId.textContent = '{{ __('Hidden for privacy') }}';
                }
            }, 10000);

            if (typeof confetti !== 'undefined') {
                confetti({ particleCount: 100, spread: 70, origin: { y: 0.6 } });
            }
        });
    </script>

</body>
</html>
