<section class="min-h-fit bg-white px-4 sm:px-6 py-12 sm:py-16 flex flex-col items-center">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-[#1F2937] mb-12 sm:mb-16 md:mb-20">
        {{ __("Voices of Our Valued Customers") }}
    </h2>

    @php   
    $testimonials = [
            [
                'image' => 'images/card1.png',
                'title' => 'Fajar Pratama',
                'subtitle' => __('Head of Product at SkyLink Drones'),
                'rating' => 5,
                'comment' => __('Sleek design and blazing speed – love it!'),
            ],
            [
                'image' => 'images/card2.png',
                'title' => 'Ratna Dewi Kusuma',
                'subtitle' => __('Founder of Bloom & Bite Bakery'),
                'rating' => 4,
                'comment' => __('Pro-level camera in such a slim body.'),
            ],
            [
                'image' => 'images/card3.png',
                'title' => 'Bayu Saputra',
                'subtitle' => __('CTO of SmartHome AI'),
                'rating' => 5,
                'comment' => __('Fast, powerful, and stylish.'),
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
