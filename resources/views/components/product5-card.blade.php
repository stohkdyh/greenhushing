{{-- <resources>
<views>
<components>
<product5-card></product5-card>.blade.php --}}
@props([
    'image', // Gambar HP di tengah
    'specsLeft' => [],
    'specsRight' => [],
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

<div class="w-full px-6 py-12 bg-white font-inter">
    <!-- Judul rata kiri -->
    <h2 class="text-3xl font-bold text-gray-800 mb-10 md:text-left text-center fade-in-left">Specs Snapshot</h2>

    <div class="flex flex-col md:flex-row items-center justify-betweem md:justify-between gap-14 relative">
        <!-- LEFT SPECS -->
        <div class="flex flex-col gap-10 items-end ml-4 mt-6">
            @foreach ($specsLeft as $spec)
                <div class="bg-[#1C2D3C] text-white text-center rounded-lg px-5 py-3 w-64 shadow-md relative fade-in-left">
                    <div class="text-sm font-semibold">{{ $spec['title'] }}</div>
                    <div class="text-xs text-gray-300">{{ $spec['value'] }}</div>
                    <div class="absolute right-[-340px] top-1/2 transform -translate-y-1/2 w-[340px] h-[2px] bg-gray-400"></div>
                </div>
            @endforeach
        </div>

        <!-- IMAGE CENTER -->
        <div class="relative z-10 fade-in-right">
            <img src="{{ asset($image) }}" alt="Phone Image" class="w-[150px] md:w-[240px]">
        </div>

        <!-- RIGHT SPECS -->
        <div class="flex flex-col gap-10">
            @foreach ($specsRight as $spec)
                <div class="bg-[#1C2D3C] text-white text-center rounded-lg px-5 py-3 w-64 shadow-md relative fade-in-right">
                    <div class="text-sm font-semibold">{{ $spec['title'] }}</div>
                    <div class="text-xs text-gray-300">{{ $spec['value'] }}</div>
                    <div class="absolute left-[-340px] top-1/2 transform -translate-y-1/2 w-[340px] h-[2px] bg-gray-400"></div>
                </div>
            @endforeach
        </div>
    </div>
</div>
