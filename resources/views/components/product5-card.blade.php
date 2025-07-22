@props([
    'image',
    'specsLeft' => [],
    'specsRight' => [],
    'textColor' => '#1F2937',
    'textTitleColor' => '#374151',
    'textValueColor' => '#000000'
])

<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    * {
        font-family: 'Inter', sans-serif;
    }

    h1, .heading {
        font-family: 'Montserrat', sans-serif;
    }

    @keyframes fadeInLeft {
        0% { opacity: 0; transform: translateX(-50px); }
        100% { opacity: 1; transform: translateX(0); }
    }

    @keyframes fadeInRight {
        0% { opacity: 0; transform: translateX(50px); }
        100% { opacity: 1; transform: translateX(0); }
    }

    .fade-in-left, .fade-in-right {
        opacity: 0;
    }

    .animate-left {
        animation: fadeInLeft 1s ease-out forwards;
    }

    .animate-right {
        animation: fadeInRight 1s ease-out forwards;
    }
</style>

<div class="min-h-screen w-full px-6 md:px-20 py-12 bg-white font-inter flex flex-col justify-center">
    <!-- JUDUL -->
    <h2 class="text-4xl md:text-5xl font-bold mb-20 text-center lg:text-left fade-in-left"
        style="color: {{ $textColor }};">
        Specs Snapshot
    </h2>

    <!-- FLEX ROW: IMAGE & SPECS -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-16">
        <!-- IMAGE LEFT -->
        <div class="flex justify-center lg:justify-start w-full lg:w-auto fade-in-left">
            <img src="{{ asset($image) }}" alt="Phone Image" class="w-[120px] sm:w-[120px] md:w-[200px] lg:mx-20 w-[280px] object-contain" />
        </div>

        <!-- SPECS SECTION -->
        <div class="flex flex-col lg:flex-row justify-between w-full gap-4 fade-in-right lg:gap-12">
            <!-- LEFT SPECS -->
            <div class="flex flex-col justify-center gap-4 w-full lg:w-1/2 lg:gap-12">
                @foreach ($specsLeft as $spec)
                    <div class="flex items-center gap-4">
                        {!! $spec['icon'] ?? '' !!}
                        <div>
                            <p class="text-xs sm:text-sm lg:text-sm font-light" style="color: {{ $textTitleColor }};">{{ $spec['title'] }}</p>
                            <p class="text-base sm:text-lg lg:text-xl font-semibold" style="color: {{ $textValueColor }};">{{ $spec['value'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- RIGHT SPECS -->
            <div class="flex flex-col justify-center gap-4 w-full lg:w-1/2 lg:gap-12">
                @foreach ($specsRight as $spec)
                    <div class="flex items-center gap-4">
                        {!! $spec['icon'] ?? '' !!}
                        <div>
                            <p class="text-xs sm:text-sm lg:text-sm font-light" style="color: {{ $textTitleColor }};">{{ $spec['title'] }}</p>
                            <p class="text-base sm:text-lg lg:text-xl font-semibold" style="color: {{ $textValueColor }};">{{ $spec['value'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
