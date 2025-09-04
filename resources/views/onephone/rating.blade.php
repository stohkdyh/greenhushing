<section class="min-h-fit bg-white px-4 sm:px-6 py-12 sm:py-16 flex flex-col items-center">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-[#1C4F2B] mb-12 sm:mb-16 md:mb-20">
        {{ __("Voices of Our Valued Customers") }}
    </h2>

    @php
        $testimonials = [
        [
            'image' => 'images/card1.png',
            'title' => 'Michael Thompson',
            'subtitle' => __('Technology Blogger'),
            'rating' => 4.9,
            'comment' => __('The buying process was straightforward with clear details provided, making me confident from start to finish.'),
        ],
        [
            'image' => 'images/card2.png',
            'title' => 'Sophia Martinez',
            'subtitle' => __('Product Designer'),
            'rating' => 4.3,
            'comment' => __('Everything was presented openly and honestly, and the smartphone’s quality exceeded my expectations.'),
        ],
        [
            'image' => 'images/card3.png',
            'title' => 'Daniel Walker',
            'subtitle' => __('Entrepreneur'),
            'rating' => 5,
            'comment' => __('I appreciate how the specifications matched exactly what was described from the very beginning.'),
        ],
    ];
    @endphp

    <div class="w-full max-w-7xl">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach ($testimonials as $item)
                <div class="w-full">
                    <x-rating-card :image="$item['image']" :title="$item['title']" :subtitle="$item['subtitle']" :rating="$item['rating']"
                        :comment="$item['comment']" class="w-full" />
                </div>
            @endforeach
        </div>
    </div>
</section>
