@props([
    'image' => '',
    'title' => '',
    'subtitle' => '',
    'rating' => 0,
    'comment' => ''
])

<div {{ $attributes->merge([
        'class' => '
            bg-white shadow-lg rounded-2xl p-4 sm:p-6 
            w-full max-w-xs sm:max-w-sm md:max-w-md 
            flex-shrink-0 
            border border-gray-100 text-center 
            transform transition duration-300 ease-out hover:-translate-y-1 hover:shadow-xl 
            mx-auto
        '
    ]) }}>

    <div class="text-center"> 
        <img src="{{ asset($image) }}" alt="{{ $title }}"
            class="w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-full object-cover mx-auto mb-3 sm:mb-4">
        <h3 class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">
            {{ $title }}
        </h3>
        <p class="text-[11px] sm:text-xs md:text-sm text-gray-500">
            {{ $subtitle }}
        </p>
    </div>

    {{-- Rating --}}
    <div class="flex justify-center space-x-1 mt-20 mb-4">
        <x-star-rating 
                :rating="$rating" 
                size="16" 
                full-color="gold" 
                empty-color="lightgray"
            />
    </div>

    {{-- Comment --}}
    <p class="text-gray-500 text-[11px] sm:text-xs md:text-sm leading-relaxed">
        “{{ $comment }}”
    </p>
</div>
