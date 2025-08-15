@props([
    'rating' => 0,
    'size' => 20,
    'fullColor' => 'gold',
    'emptyColor' => '#f5f5f5',
])

@php
    $maxStars = 5;
    $full = floor($rating); // Bintang penuh
    $partial = $rating - $full; // Sisanya untuk bintang terakhir
    $empty = $maxStars - $full - ($partial > 0 ? 1 : 0);
    $percent = round($partial * 100); // Persentase isi bintang terakhir
@endphp

<div class="flex items-center">
    {{-- Bintang penuh --}}
    @for ($i = 0; $i < $full; $i++)
        <svg xmlns="http://www.w3.org/2000/svg" width="{{ $size }}" height="{{ $size }}" fill="{{ $fullColor }}" viewBox="0 0 24 24">
            <path d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.787 1.4 8.168L12 18.896l-7.334 3.87 1.4-8.168L.132 9.211l8.2-1.193z"/>
        </svg>
    @endfor

    {{-- Bintang parsial (kalau ada sisa) --}}
    @if ($partial > 0)
        <svg xmlns="http://www.w3.org/2000/svg" width="{{ $size }}" height="{{ $size }}" viewBox="0 0 24 24">
            <defs>
                <linearGradient id="partial-star">
                    <stop offset="{{ $percent }}%" stop-color="{{ $fullColor }}" />
                    <stop offset="{{ $percent }}%" stop-color="{{ $emptyColor }}" stop-opacity="1" />
                </linearGradient>
            </defs>
            <path fill="url(#partial-star)" d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.787 1.4 8.168L12 18.896l-7.334 3.87 1.4-8.168L.132 9.211l8.2-1.193z"/>
        </svg>
    @endif

    {{-- Bintang kosong --}}
    @for ($i = 0; $i < $empty; $i++)
        <svg xmlns="http://www.w3.org/2000/svg" width="{{ $size }}" height="{{ $size }}" fill="{{ $emptyColor }}" viewBox="0 0 24 24">
            <path d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.787 1.4 8.168L12 18.896l-7.334 3.87 1.4-8.168L.132 9.211l8.2-1.193z"/>
        </svg>
    @endfor
</div>
