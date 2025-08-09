{{-- Advertisement --}}
<div class="pb-6 border-b border-gray-100">
    <h2 class="text-xs text-gray-400 font-medium mb-2 tracking-wide border-b border-gray-200 pb-1">ADVERTISEMENT</h2>
    <a href="#">
        <img src="{{ asset('images/ad_banner.png') }}" class="rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 w-full h-auto">
    </a>
</div>

{{-- Related Contents --}}
<aside class="py-6 border-b border-gray-100">
    <h2 class="text-base font-light text-gray-800 mb-4 border-b border-gray-200 pb-2">RELATED CONTENTS</h2>
    <ul class="space-y-4">
        @foreach([
            ['title' => "How EcoVadis Achieved All of its Emissions Goals", 'tag' => 'ESG'],
            ['title' => "Snacks Going Electric: PepsiCo’s Renewable-Powered Ovens", 'tag' => 'Renewable Energy'],
            ['title' => "How Coldplay is Turning River Plastic into Vinyl Records", 'tag' => 'Sustainability'],
            ['title' => "This Week’s Top Five Stories in Sustainability", 'tag' => 'Sustainability']
        ] as $item)
            <li>
                <a href="#" class="block text-sm text-gray-700 font-medium hover:text-green-700 transition-colors leading-snug">
                    {{ $item['title'] }}
                </a>
                <span class="mt-1 inline-block text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">
                    {{ $item['tag'] }}
                </span>
            </li>
        @endforeach
    </ul>
</aside>

{{-- Top Categories --}}
<div class="py-6 border-b border-gray-100">
    <h2 class="text-base font-light text-gray-800 mb-4 border-b border-gray-200 pb-2">TOP CATEGORIES</h2>
    <div class="flex flex-wrap gap-2">
        @foreach(['Climate', 'Renewable Energy', 'EV', 'Waste Management', 'Innovation'] as $tag)
            <a href="#" class="text-xs text-gray-600 bg-gray-100 px-3 py-1.5 rounded-full hover:bg-green-50 hover:text-green-700 transition-colors">
                {{ $tag }}
            </a>
        @endforeach
    </div>
</div>
