@props([
    'title',
    'description',
    'highlight',
    'image',
    'bg' => '#ffffff',
    'highlightColor' => '#000000',
    'titleColor' => '#111827',
    'imageBg' => '#ffffff',
    'imageWidth' => "w-[280px] sm:w-[340px] md:w-[380px] lg:w-[500px]",
    'icon' => false,
    'cardSize' => "max-w-[380px] min-h-[380px] sm:min-w-[400px] sm:min-h-[460px] md:min-w-[360px] md:min-h-[420px] lg:min-w-[400px] lg:min-h-[460px]",
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

<div class="min-h-fit md:min-h-screen flex flex-col-reverse md:flex-row 
            items-center justify-between 
            px-6 md:px-20 py-12 sm:py-20 md:py-32 
            gap-12 md:gap-16"
     style="background: {{ $bg }}">

    <!-- Gambar dan card -->
    <div class="w-full md:w-1/2 flex justify-center md:justify-start relative fade-in-right">
        <!-- Wrapper Card -->
        <div class="relative w-full {{ $cardSize }} mx-auto">
            <!-- Card Latar -->
            <div class="rounded-3xl px-8 sm:px-12 py-8 sm:py-10 shadow-xl w-full h-full z-0 relative"
                style="background-color: {{ $imageBg }};">
            </div>

            <!-- Gambar -->
            <img src="{{ asset($image) }}"
                alt="{{ $highlight }}"
                class="absolute left-1/2 -translate-x-1/2 bottom-[-40px] sm:bottom-[-80px] h-auto object-contain z-10 drop-shadow-2xl transition-transform duration-500 hover:scale-105 {{ $imageWidth }}" />
        </div>
    </div>

    <!-- Teks -->
    <div class="w-full md:w-1/2 fade-in-left text-left md:text-left">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold mb-6 sm:mb-8 leading-tight" style="color: {{ $titleColor }}">
            {{ $title }}
        </h1>
        <p class="text-base sm:text-lg md:text-2xl text-gray-700 mb-4 sm:mb-6 leading-relaxed text-justify">
            {{ $description }}
        </p>
        <p class="relative inline-flex items-center gap-2 px-3 py-1.5
                text-base sm:text-lg md:text-xl font-semibold
                rounded-lg shadow-sm
                transition-all duration-300
                hover:scale-105 hover:shadow-md
                before:content-[''] before:absolute before:left-[-8px] before:top-1/2 before:-translate-y-1/2
                before:border-[6px] before:border-transparent"
        style="color: {{ $highlightColor }};
                background-color: {{ $highlightColor }}10;
                border: 1px solid {{ $highlightColor }}30;
                --tw-border-opacity: 1;
                ">
            <span class="before:absolute before:left-[-8px] before:top-1/2 before:-translate-y-1/2 before:border-[6px] before:border-transparent"
                style="position: absolute; left:-8px; top:50%; transform:translateY(-50%);
                        border-width:6px;
                        border-style:solid;
                        border-color:transparent {{ $highlightColor }}30 transparent transparent;">
            </span>

            @if($icon)
                <span class="text-current">
                    @include('components.icon.' . $icon)
                </span>
            @endif

            {{ $highlight }}
        </p>
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
                    observer.unobserve(el);
                }
            });
        }, {
            threshold: 0.1
        });

        const targets = document.querySelectorAll('.fade-in-left, .fade-in-right');
        targets.forEach(el => observer.observe(el));
    });
</script>