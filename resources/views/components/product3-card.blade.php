@props([
    'title',
    'description',
    'highlight',
    'image',
    'bg' => '#ffffff',
    'titleColor' => '#111827',
    'highlightColor' => '#4f46e5',
    'imageBg' => '#fffff',
    'imageWidth' => '400px', // default ukuran
    'imageHeight' => 'auto',
    'imagePositionX' => '50%', // posisi horizontal
    'imagePositionY' => '-50px', // posisi vertikal
    'icon' => false,
])

<!-- Google Fonts -->
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


<div class="min-h-screen flex flex-col-reverse md:flex-row items-center justify-between px-6 md:px-20 lg:px-20 py-32 md:py-16 lg:py-16 gap-12 md:gap-16" style="background: {{ $bg }}">
    <!-- Gambar dan card -->
    <div class="w-full md:w-1/2 flex justify-center md:justify-start relative fade-in-right">
        <div class="relative w-full max-w-[380px] min-h-[380px] sm:min-w-[400px] sm:min-h-[460px] mx-auto">
            <!-- Card latar -->
            <div class="rounded-3xl px-8 sm:px-12 py-8 sm:py-10 shadow-xl w-full h-full z-0 relative" style="background-color: #{{ ltrim($imageBg, '#') }}"></div>

            <img src="{{ asset($image) }}"
                alt="{{ $highlight }}"
                style="
                    width: {{ $imageWidth }};
                    height: {{ $imageHeight }};
                    left: {{ $imagePositionX }};
                    bottom: {{ $imagePositionY }};
                    transform: translateX(-50%);
                "
                class="absolute
                    h-auto object-contain z-10 drop-shadow-2xl 
                    transition-transform duration-500 hover:scale-105" />
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

<!-- Scroll-triggered animation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('fade-in-left')) {
                        entry.target.classList.add('animate-left');
                    } else if (entry.target.classList.contains('fade-in-right')) {
                        entry.target.classList.add('animate-right');
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        document.querySelectorAll('.fade-in-left, .fade-in-right').forEach(el => observer.observe(el));
    });
</script>
