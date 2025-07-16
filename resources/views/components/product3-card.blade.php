{{-- <resources>
<views>
<components>
<product3-card></product3-card>.blade.php --}}
@props([
    'percentage' => '100%',
    'description' => 'Charged Within One Hour',
    'highlight' => 'Fast Charging',
    'image', // contoh: 'images/charging_phone.png'
    'bg' => '#f9fafb',
    'highlightColor' => '#000000',
    'imageBg' => '#dbe0f2'
])

<!-- Import Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,600;1,400&family=Montserrat:ital,wght@0,600;1,600&display=swap" rel="stylesheet">


<style>
    body {
        font-family: 'Inter', sans-serif;
    }

     p, h1, h2, h3, .heading {
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

<div class="min-h-screen flex flex-col md:flex-row items-center justify-between px-20 py-24 gap-20" style="background: {{ $bg }}">
    <!-- Gambar HP -->
    <div class="md:w-1/2 flex justify-center relative fade-in-left">
        <div class="relative min-w-[400px] min-h-[460px]">
            <!-- Card ungu -->
            <div class="rounded-3xl px-12 py-12 shadow-2xl w-full h-full relative z-0" style="background:{{ $imageBg }}"></div>

            <!-- Gambar HP -->
            <img src="{{ asset($image) }}"
                alt="{{ $highlight }}"
                class="absolute left-8 bottom-[-60px] w-[400px] object-contain z-10 drop-shadow-2xl hover:scale-105 hover:-rotate-1 transition-all duration-500" />
        </div>
    </div>

    <!-- Teks -->
    <div class="md:w-1/2 text-center md:text-left fade-in-right">
        <h1 class="text-[80px] font-extrabold italic text-gray-900 leading-tight mb-4">{{ $percentage }}</h1>
        <p class="text-2xl text-gray-700 mb-6 leading-relaxed text-justify">{{ $description }}</p>
        <p class="text-[20px] font-semibold underline underline-offset-4 hover:text-indigo-600 transition-all duration-300" style="color: {{ $highlightColor }}">
            {{ $highlight }}
        </p>
    </div>
</div>

<!-- Scroll-triggered animation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        const elements = document.querySelectorAll('.fade-in-up');
        elements.forEach(el => observer.observe(el));
    });
</script>
