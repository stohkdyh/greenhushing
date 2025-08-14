<section class="min-h-screen bg-white px-4 sm:px-6 py-12 sm:py-16 flex flex-col items-center">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-[#1C4F2B] mb-12 sm:mb-16 md:mb-20">
        Voices of Our Valued Customers
    </h2>

    @php   
    $testimonials = [
            [
                'image' => 'images/card1.png',
                'title' => 'Aditya Eka Prasetya',
                'subtitle' => 'Founder of Gun Market',
                'rating' => 5,
                'comment' => 'We’ve expanded our lineup of carbon-neutral products to include Aeraphone one series.',
            ],
            [
                'image' => 'images/card2.png',
                'title' => 'Siti Nurhaliza',
                'subtitle' => 'CEO of GreenTech',
                'rating' => 4,
                'comment' => 'Service sangat memuaskan, produk berkualitas tinggi!',
            ],
            [
                'image' => 'images/card3.png',
                'title' => 'Budi Santoso',
                'subtitle' => 'Entrepreneur',
                'rating' => 5,
                'comment' => 'Pelayanan cepat dan responsif, sangat direkomendasikan.',
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
