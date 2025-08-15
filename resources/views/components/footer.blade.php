@props([
    'brand' => 'Onephone',
    'logo' => 'images/logo_claim_green.png',
    'newsletterTitle' => 'Onephone Newsletter',
    'newsletterDesc' => 'Stay up to date with the latest news and stories from Onephone.',
    'menus' => [],
    'year' => date('Y'),
    'bg' => 'bg-[#000000]'

])

<footer class="{{ $bg }} text-white py-10 px-4">
    <div class="max-w-7xl mx-auto space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 text-sm">
            <!-- Brand -->
            <div class="flex flex-col items-start">
                <h2 class="text-3xl font-bold text-white">{{ $brand }}</h2>
                @if(!empty($logo))
                    <img src="{{ $logo }}" alt="logo {{ strtolower($brand) }}" class="h-16 mt-1 w-auto">
                @endif
            </div>

            <!-- Newsletter -->
            <div class="max-w-md w-full md:ml-4">
                <h3 class="text-white font-semibold">{{ $newsletterTitle }}</h3>
                <p class="text-white/70 mb-4 text-sm">{{ $newsletterDesc }}</p>

                <!-- Form -->
                <form action="#" class="flex items-center gap-3">
                    <input 
                        type="email" 
                        placeholder="Enter your email" 
                        class="flex-1 px-3 py-2 bg-transparent 
                            !border-0 !border-b !border-b-white/60 
                            text-white placeholder-white/50 placeholder:text-sm 
                            focus:outline-none focus:!border-b-[#112F1A] transition" />

                    <button 
                        type="submit"
                        class="px-5 py-2 rounded-3xl text-sm font-medium text-white 
                            border border-white/60 bg-white/10 
                            hover:bg-[#112F1A] hover:border-[#112F1A] 
                            hover:text-white transition">
                        Sign Up
                    </button>
                </form>
            </div>
        </div>

        <!-- Bagian tengah: Menu Horizontal -->
        <!-- Menu -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-sm text-white">
            @foreach ($menus as $menuTitle => $menuItems)
                <div>
                    <h3 class="text-white font-bold mb-3">{{ $menuTitle }}</h3>
                    <ul class="space-y-2 font-light ml-1">
                        @foreach ($menuItems as $item)
                            <li>
                                <a href="{{ $item['url'] ?? '/' }}" class="hover:underline hover:text-black">
                                    {{ $item['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>


        <!-- Copyright -->
        <div class="border-t border-gray-300 pt-4 text-center text-sm text-white font-light">
            &copy; {{ $year }} {{ $brand }}. All rights reserved.
        </div>
    </div>
</footer>
