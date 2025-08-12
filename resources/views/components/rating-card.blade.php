@props([
    'image' => '',
    'title' => '',
    'subtitle' => '',
    'rating' => 0,
    'comment' => ''
])

<div {{ $attributes->merge([
        'class' => '
            bg-white shadow-lg rounded-2xl p-6 
            w-full max-w-sm flex-shrink-0 
            border border-gray-100 text-center 
            transform transition-transform duration-300 ease-out
            sm:p-6
        '
    ]) }}>

    <div class="mb-6 sm:mb-8">
        {{-- Foto User --}}
        <img src="{{ asset($image) }}" alt="{{ $title }}"
             class="w-16 h-16 rounded-full object-cover mx-auto mb-4">

        {{-- Nama & Subtitle --}}
        <h3 class="text-base sm:text-lg font-semibold text-gray-800">{{ $title }}</h3>
        <p class="text-xs sm:text-sm text-gray-500 mb-4">{{ $subtitle }}</p>
    </div>

    {{-- Rating --}}
    <div class="flex items-center justify-center mb-4">
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $rating)
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-400"
                     fill="currentColor"
                     viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.2 3.674a1 1 0 00.95.69h3.862c.969 0 1.371 1.24.588 1.81l-3.127 2.27a1 1 0 00-.364 1.118l1.2 3.674c.3.921-.755 1.688-1.54 1.118l-3.127-2.27a1 1 0 00-1.176 0l-3.127 2.27c-.785.57-1.84-.197-1.54-1.118l1.2-3.674a1 1 0 00-.364-1.118L2.45 9.101c-.783-.57-.38-1.81.588-1.81h3.862a1 1 0 00.95-.69l1.2-3.674z"/>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4 sm:w-5 sm:h-5 text-gray-300"
                     fill="currentColor"
                     viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.2 3.674a1 1 0 00.95.69h3.862c.969 0 1.371 1.24.588 1.81l-3.127 2.27a1 1 0 00-.364 1.118l1.2 3.674c.3.921-.755 1.688-1.54 1.118l-3.127-2.27a1 1 0 00-1.176 0l-3.127 2.27c-.785.57-1.84-.197-1.54-1.118l1.2-3.674a1 1 0 00-.364-1.118L2.45 9.101c-.783-.57-.38-1.81.588-1.81h3.862a1 1 0 00.95-.69l1.2-3.674z"/>
                </svg>
            @endif
        @endfor
    </div>

    {{-- Comment --}}
    <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">
        “{{ $comment }}”
    </p>
</div>
