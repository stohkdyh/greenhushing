{{-- <resources>
<views>
<components>
<product2-card></product2-card>.blade.php --}}
@props([
    'title',
    'description',
    'highlight',
    'image', // gabungan tampak belakang & samping
    'bg' => '#ffffff',
    'highlightColor' => '#000000',
    'imageBg' => '#dbe0f2'
])

<!-- Google Font-->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">


<style>
    * {
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

<div class="min-h-screen flex flex-col md:flex-row items-center justify-between px-20 py-24 gap-16" style="background: {{ $bg }}">

    <!-- Teks -->
    <div class="md:w-1/2 fade-in-left">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-8 leading-tight">{{ $title }}</h1>
        <p class="text-2xl text-gray-700 mb-6 leading-relaxed text-justify">{{ $description }}</p>
        <p class="text-xl font-semibold underline underline-offset-4" style="color: {{ $highlightColor }}">
            {{ $highlight }}
        </p>
    </div>

    <!-- Gambar dan card -->
    <div class="md:w-1/2 flex justify-center md:justify-start relative fade-in-right">
        <div class="relative min-w-[420px] min-h-[460px] mx-auto">
            <!-- Card latar -->
            <div class="rounded-3xl px-12 py-10 shadow-xl w-full h-full z-0 relative" style="background:{{ $imageBg }}"></div>

            <!-- Gambar HP besar & center -->
            <img src="{{ asset($image) }}"
                alt="{{ $highlight }}"
                class="absolute left-1/2 -translate-x-1/2 bottom-[-60px] w-[400px] h-auto object-contain z-10 drop-shadow-2xl transition-transform duration-500 hover:scale-105" />
        </div>
    </div>

</div>

<!-- Animasi saat scroll -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    if (el.classList.contains('fade-in-left')) {
                        el.classList.add('animate-left');
                    } else if (el.classList.contains('fade-in-right')) {
                        el.classList.add('animate-right');
                    }
                    observer.unobserve(el); // animasi hanya sekali
                }
            });
        }, {
            threshold: 0.1
        });

        const targets = document.querySelectorAll('.fade-in-left, .fade-in-right');
        targets.forEach(el => observer.observe(el));
    });
</script>
