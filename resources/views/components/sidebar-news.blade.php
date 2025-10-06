{{-- Advertisement --}}
<div class="pb-6 border-b border-gray-100">
    <h2 class="text-xs text-gray-400 font-medium mb-2 tracking-wide border-b border-gray-200 pb-1">{{ __('ADVERTISEMENT') }}</h2>
    
    <a class="block pointer-events-none cursor-default opacity-70">
        <img 
            src="{{ asset('images/ad_banner.png') }}" 
            class="rounded-xl shadow-sm w-full h-auto grayscale"
        >
    </a>
</div>

{{-- Related Contents --}}
<aside class="py-6 border-b border-gray-100">
    <h2 class="text-base font-light text-gray-800 mb-4 border-b border-gray-200 pb-2">
        {{ __('RELATED CONTENTS') }}
    </h2>
    <ul class="space-y-4">
        @foreach([
            ['title' => __('How EcoVadis Achieved All of its Emissions Goals'), 'tag' => __('ESG')],
            ['title' => __('Snacks Going Electric: PepsiCo’s Renewable-Powered Ovens'), 'tag' => __('Renewable Energy')],
            ['title' => __('How Coldplay is Turning River Plastic into Vinyl Records'), 'tag' => __('Sustainability')],
            ['title' => __('This Week’s Top Five Stories in Sustainability'), 'tag' => __('Sustainability')]
        ] as $item)
            <li>
                <span class="block text-sm text-gray-800 font-medium cursor-default leading-snug select-none">
                    {{ __($item['title']) }}
                </span>
                <span class="mt-1 inline-block text-xs text-gray-700 bg-gray-100 px-2 py-0.5 rounded-full cursor-default select-none">
                    {{ $item['tag'] }}
                </span>
            </li>
        @endforeach
    </ul>
</aside>

{{-- Top Categories --}}
<div class="py-6 border-b border-gray-100">
    <h2 class="text-base font-light text-gray-800 mb-4 border-b border-gray-200 pb-2">
        {{ __('TOP CATEGORIES') }}
    </h2>
    <div class="flex flex-wrap gap-2">
        @foreach([
            __('Climate'),
            __('Renewable Energy'),
            __('EV'),
            __('Waste Management'),
            __('Innovation'),
        ] as $tag)
            <span class="text-xs text-gray-800 bg-gray-100 px-3 py-1.5 rounded-full cursor-default select-none">
                {{ $tag }}
            </span>
        @endforeach
    </div>
</div>
