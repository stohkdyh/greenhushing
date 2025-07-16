{{-- <resources>
<views>
<components>
<product4-card></product4-card>.blade.php --}}
@props([
    'title' => 'Water and dust resistance',
    'description' => 'lets you take this product further than you thought possible',
    'highlight' => 'Water Resistence',
    'image',
    'bg' => '#ffffff',
    'highlightColor' => '#000000',
    'imageBg' => '#dbe0f2'
])

<!-- Google Fonts (gunakan sekali saja di layout utama jika sudah ada) -->
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;1,400&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

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

<div class="w-full min-h-screen flex flex-col md:flex-row items-center justify-between px-12 py-16 gap-12 fade-in" style="background: {{ $bg }}">
    <!-- Teks -->
    <div class="md:w-1/2 md:pr-12 text-center md:text-left fade-in-left">
        <h1  class="text-4xl font-extrabold text-gray-900 mb-8 leading-tight"  >
            {{ $title }}
        </h1>
        <p class="text-lg md:text-xl text-gray-600 mb-6 leading-relaxed">
            {{ $description }}
        </p>
        <p class="text-base md:text-lg font-semibold underline underline-offset-4" style="color: {{ $highlightColor }};">
            {{ $highlight }}
        </p>
    </div>

    <!-- Gambar HP -->
    <div class="md:w-1/2 flex justify-center relative fade-in-right">
        <div class="relative min-w-[400px] min-h-[460px]">
            <!-- Card ungu -->
            <div class="rounded-3xl px-12 py-12 shadow-2xl w-full h-full relative z-0" style="background: {{ $imageBg }}">


            <!-- Gambar HP -->
            <img src="{{ asset($image) }}"
                alt="{{ $highlight }}"
                class="absolute left-8 bottom-[-60px] w-[400px] object-contain z-10 drop-shadow-2xl hover:scale-105 hover:-rotate-1 transition-all duration-500" />
            </div>
        </div>
    </div>
</div>
