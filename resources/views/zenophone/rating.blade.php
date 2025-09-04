<section class="min-h-fit bg-white px-4 sm:px-6 py-12 sm:py-16 flex flex-col items-center">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-[#1C4F2B] mb-12 sm:mb-16 md:mb-20">
        {{ __("Voices of Our Valued Customers") }}
    </h2>

    @php
        $testimonials = [
            [
                'image' => 'images/card1.png',
                'title' => 'Bayu Wicaksono',
                'subtitle' => __('Founder of UrbanRide App'),
                'rating' => 5,
                'comment' => __('Love how Zenophone is built with sustainability in mind.'),
            ],
            [
                'image' => 'images/card2.png',
                'title' => 'Sinta Maharani',
                'subtitle' => __('Marketing Director at Lumina Cosmetics'),
                'rating' => 4,
                'comment' => __('Responsibly sourced materials make me trust this brand more.'),
            ],
            [
                'image' => 'images/card3.png',
                'title' => 'Surya Pratama',
                'subtitle' => __('Founder of WanderWorld Travel'),
                'rating' => 5,
                'comment' => __('Redesigning the future with a lower impact – inspiring!'),
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
