<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Mobile Navigation -->
    <div class="lg:hidden">
        <div class="px-4 sm:px-6">
            <div class="flex h-16 items-center justify-between">
                <!-- Mobile Logo -->
                <div class="flex items-center">
                    <a href="/market">
                        <img src="{{ asset('images/logo_market.png') }}" class="h-8 w-fit" alt="Market Logo">
                    </a>
                </div>

                <div class="ps-auto">
                    <x-languange-switch class="text-sm" />
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden">
            <div class="px-4 pt-2 pb-3 space-y-1 bg-white border-t border-gray-200">
                <!-- Mobile Search -->
                <div class="py-2">
                    <x-text-input id="search-mobile" type="text" name="search" placeholder="{{ __('Search') }}"
                        autocomplete="off" class="w-full h-10" />
                </div>

                <!-- Mobile Icons -->
                <div class="flex items-center justify-between py-2 border-t border-gray-200">
                    <div class="flex items-center space-x-6">
                        <!-- Profile Icon -->
                        <button
                            class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>

                        <!-- Cart Icon -->
                        <button
                            class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Desktop Navigation -->
    <div class="hidden lg:block">
        <div class="mx-4 xl:mx-20 px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Desktop Logo -->
                <div class="flex items-center">
                    <a href="/market">
                        <img src="{{ asset('images/logo_market.png') }}" class="h-9 w-auto" alt="Market Logo">
                    </a>
                </div>

                <!-- Desktop Content -->
                <div class="flex items-center gap-6">
                    <!-- Desktop Search -->
                    <div class="hidden md:block">
                        <x-text-input id="search" type="text" name="search" placeholder="{{ __('Search') }}"
                            autocomplete="off" class="w-[20rem] lg:w-[25rem] xl:w-[30rem] max-w-full h-[2.35rem]" />
                    </div>

                    <!-- Desktop Icons -->
                    <button
                        class="p-1 rounded-md text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                            stroke="currentColor" class="w-6 h-6 lg:w-7 lg:h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>

                    <button
                        class="p-1 rounded-md text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 lg:w-7 lg:h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </button>

                    <!-- Desktop Language Switch -->
                    <x-languange-switch class="h-full px-0" />
                </div>
            </div>
        </div>
    </div>
</nav>
