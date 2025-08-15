<section class="min-h-screen bg-white px-4 sm:px-6 py-12 sm:py-16 flex flex-col items-center">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-[#1C4F2B] mb-12 sm:mb-16 md:mb-20">
        {{ __("Voices of Our Valued Customers") }}
    </h2>

    @php   
    $testimonials = [
            [
                'image' => 'images/card1.png',
                'title' => 'Angkasa Janendra',
                'subtitle' => __('CEO of GreenTech Solutions'),
                'rating' => 5,
                'comment' => __('The performance is lightning fast, and the battery easily lasts me a full day of heavy use.'),
            ],
            [
                'image' => 'images/card2.png',
                'title' => 'Melati Prameswari',
                'subtitle' => __('Founder of EcoStyle Fashion'),
                'rating' => 4,
                'comment' => __('Waterproof and dustproof – perfect for my lifestyle!'),
            ],
            [
                'image' => 'images/card3.png',
                'title' => 'Surya Nugraha',
                'subtitle' => __('Co-founder of EduLearn App'),
                'rating' => 5,
                'comment' => __('Strong, stylish, and future-proof.'),
            ],
        ];
    @endphp

    {{-- Semua ukuran: grid, tapi kolom berubah sesuai breakpoint --}}
    <div class="w-full max-w-7xl">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach ($testimonials as $item)
                <div class="w-full">
                    <x-rating-card
                        :image="$item['image']"
                        :title="$item['title']"
                        :subtitle="$item['subtitle']"
                        :rating="$item['rating']"
                        :comment="$item['comment']"
                        class="w-full"
                    />
                </div>
            @endforeach
        </div>
    </div>
</section>
