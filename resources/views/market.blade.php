<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen bg-gray-100">
        @include($nav ?? 'layouts.navigation')

        <!-- Auto-redirect modal -->
        <div id="auto-redirect-modal"
            class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 p-6 text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('All Products Rated!') }}</h3>
                <p class="text-gray-600 mb-6">
                    {{ __('You have successfully rated all products. Redirecting to post-test in') }}
                    <span id="countdown" class="font-bold text-blue-600">5</span>
                    {{ __('seconds...') }}
                </p>
                <button onclick="redirectToPostTest()"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    {{ __('Go Now') }}
                </button>
            </div>
        </div>

        <main>
            <!-- Mobile/Tablet Layout -->
            <div class="lg:hidden">
                <!-- Progress indicator for mobile -->
                <div class="mx-4 mt-4 mb-6 bg-white rounded-lg p-4 shadow-md">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium text-gray-700">{{ __('Products Rated') }}</span>
                        <span id="progress-text-mobile" class="text-sm text-gray-600">0/4 {{ __('completed') }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div id="progress-bar-mobile" class="bg-blue-600 h-2 rounded-full transition-all duration-300"
                            style="width: 0%"></div>
                    </div>
                </div>

                <!-- Mobile Navigation -->
                <div class="mx-4 mb-6 bg-white rounded-lg shadow-md p-4 overflow-x-auto">
                    <div class="flex space-x-4 min-w-max">
                        <x-nav-link :href="route('market')" :active="false" class="whitespace-nowrap text-sm">
                            {{ __('Short') }}
                        </x-nav-link>
                        <x-nav-link :href="route('market')" :active="true" class="whitespace-nowrap text-sm">
                            {{ __('Latest') }}
                        </x-nav-link>
                        <x-nav-link :href="route('market')" :active="false" class="whitespace-nowrap text-sm">
                            {{ __('Popular') }}
                        </x-nav-link>
                        <x-nav-link :href="route('market')" :active="false" class="whitespace-nowrap text-sm">
                            {{ __('Best Seller') }}
                        </x-nav-link>
                        <x-nav-link :href="route('market')" :active="false" class="whitespace-nowrap text-sm">
                            {{ __('Price') }}
                        </x-nav-link>
                    </div>
                </div>

                <!-- Mobile Products Grid -->
                <div class="mx-4 pb-8">
                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($products as $product)
                            @include('partials.product-card', ['product' => $product])
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Desktop Layout -->
            <div class="hidden lg:block">
                <div class="max-w-7xl mx-auto px-6 py-8">
                    <div class="grid grid-cols-1 gap-6">

                        <!-- Progress indicator -->
                        <div class="bg-white rounded-lg p-4 shadow-md mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-700">{{ __('Products Rated') }}</span>
                                <span id="progress-text" class="text-sm text-gray-600">0/4 {{ __('completed') }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div id="progress-bar"
                                    class="bg-blue-600 h-2 rounded-full transition-all duration-300"
                                    style="width: 0%"></div>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="w-full text-lg space-x-4 mb-6">
                            <x-nav-link :href="route('market')" :active="false">
                                {{ __('Short') }}
                            </x-nav-link>
                            <x-nav-link :href="route('market')" :active="true">
                                {{ __('Latest') }}
                            </x-nav-link>
                            <x-nav-link :href="route('market')" :active="false">
                                {{ __('Popular') }}
                            </x-nav-link>
                            <x-nav-link :href="route('market')" :active="false">
                                {{ __('Best Seller') }}
                            </x-nav-link>
                            <x-nav-link :href="route('market')" :active="false">
                                {{ __('Price') }}
                            </x-nav-link>
                        </div>

                        <!-- Products Grid -->
                        <div class="grid grid-cols-2 gap-6">
                            @foreach ($products as $product)
                                @include('partials.product-card', ['product' => $product])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            </div>
        </main>

        <script>
            let ratedProducts = [];

            document.addEventListener('DOMContentLoaded', function() {
                // Load rated products on page load
                loadRatedProducts();

                // Mobile filter toggle
                const filterToggle = document.getElementById('filter-toggle');
                const mobileFilter = document.getElementById('mobile-filter');
                const filterArrow = document.getElementById('filter-arrow');

                if (filterToggle && mobileFilter) {
                    filterToggle.addEventListener('click', function() {
                        mobileFilter.classList.toggle('hidden');
                        filterArrow.style.transform = mobileFilter.classList.contains('hidden') ?
                            'rotate(0deg)' : 'rotate(180deg)';
                    });
                }

                // Handle sustainability dropdowns
                const sustainabilityButtons = document.querySelectorAll('.sustainability-toggle');

                sustainabilityButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Find the corresponding dropdown
                        const dropdown = this.nextElementSibling;
                        const arrow = this.querySelector('.dropdown-arrow');

                        // Close other dropdowns
                        document.querySelectorAll('.sustainability-dropdown').forEach(otherDropdown => {
                            if (otherDropdown !== dropdown) {
                                otherDropdown.classList.add('hidden');
                                const otherArrow = otherDropdown.previousElementSibling
                                    ?.querySelector('.dropdown-arrow');
                                if (otherArrow) {
                                    otherArrow.style.transform = 'rotate(0deg)';
                                }
                            }
                        });

                        // Toggle current dropdown
                        dropdown.classList.toggle('hidden');

                        // Rotate arrow
                        if (dropdown.classList.contains('hidden')) {
                            arrow.style.transform = 'rotate(0deg)';
                        } else {
                            arrow.style.transform = 'rotate(180deg)';
                        }
                    });
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!e.target.closest('.sustainability-container')) {
                        document.querySelectorAll('.sustainability-dropdown').forEach(dropdown => {
                            dropdown.classList.add('hidden');
                            const arrow = dropdown.previousElementSibling?.querySelector(
                                '.dropdown-arrow');
                            if (arrow) {
                                arrow.style.transform = 'rotate(0deg)';
                            }
                        });
                    }
                });

                // Disable clicks on rated products
                document.addEventListener('click', function(e) {
                    const productCard = e.target.closest('.product-card');
                    if (productCard && productCard.classList.contains('rated')) {
                        e.preventDefault();
                        e.stopPropagation();
                        return false;
                    }
                });
            });

            function loadRatedProducts() {
                fetch('{{ route('product.ratings.get') }}')
                    .then(response => response.json())
                    .then(data => {
                        ratedProducts = data.rated_products || [];
                        updateProductCards();
                        updateProgressBar();

                        if (data.all_products_rated) {
                            showAutoRedirectModal();
                        }
                    })
                    .catch(error => console.error('Error loading rated products:', error));
            }

            function updateProductCards() {
                const productCards = document.querySelectorAll('.product-card');

                productCards.forEach(card => {
                    const productName = card.dataset.product;

                    if (ratedProducts.includes(productName)) {
                        // Add rated styling
                        card.classList.add('rated');
                        card.style.filter = 'grayscale(50%)';
                        card.style.opacity = '0.7';

                        // Show rated overlay
                        const overlay = card.querySelector('.rated-overlay');
                        if (overlay) {
                            overlay.classList.remove('hidden');
                        }

                        // Disable link
                        const productLink = card.querySelector('.product-link');
                        if (productLink) {
                            productLink.style.pointerEvents = 'none';
                        }

                        // Update choose button
                        const chooseBtn = card.querySelector('.choose-product-btn');
                        if (chooseBtn) {
                            chooseBtn.classList.remove('bg-red-500', 'hover:bg-red-600');
                            chooseBtn.classList.add('bg-green-500');
                            chooseBtn.textContent = '{{ __('Rated') }}';
                            chooseBtn.style.pointerEvents = 'none';
                        }
                    }
                });
            }

            function updateProgressBar() {
                const progressBar = document.getElementById('progress-bar');
                const progressText = document.getElementById('progress-text');
                const progressBarMobile = document.getElementById('progress-bar-mobile');
                const progressTextMobile = document.getElementById('progress-text-mobile');

                const totalProducts = 4;
                const ratedCount = ratedProducts.length;
                const progressPercentage = (ratedCount / totalProducts) * 100;

                // Update desktop progress
                if (progressBar) {
                    progressBar.style.width = progressPercentage + '%';
                }
                if (progressText) {
                    progressText.textContent = `${ratedCount}/${totalProducts} {{ __('completed') }}`;
                }

                // Update mobile progress
                if (progressBarMobile) {
                    progressBarMobile.style.width = progressPercentage + '%';
                }
                if (progressTextMobile) {
                    progressTextMobile.textContent = `${ratedCount}/${totalProducts} {{ __('completed') }}`;
                }
            }

            function showAutoRedirectModal() {
                const modal = document.getElementById('auto-redirect-modal');
                modal.classList.remove('hidden');

                let countdown = 5;
                const countdownElement = document.getElementById('countdown');

                const timer = setInterval(() => {
                    countdown--;
                    countdownElement.textContent = countdown;

                    if (countdown <= 0) {
                        clearInterval(timer);
                        redirectToPostTest();
                    }
                }, 1000);
            }

            function redirectToPostTest() {
                window.location.href = '{{ route('posttest.show') }}';
            }

            // Global function to be called when rating is submitted
            window.onRatingSubmitted = function(productName, rating) {
                if (!ratedProducts.includes(productName)) {
                    ratedProducts.push(productName);
                }

                // Update the rated score display
                const productCard = document.querySelector(`[data-product="${productName}"]`);
                if (productCard) {
                    const ratedScore = productCard.querySelector('.rated-score');
                    if (ratedScore) {
                        ratedScore.textContent = `{{ __('Score:') }} ${rating}/10`;
                    }
                }

                updateProductCards();
                updateProgressBar();

                // Check if all products are rated
                if (ratedProducts.length >= 4) {
                    setTimeout(() => {
                        showAutoRedirectModal();
                    }, 1000);
                }
            };
        </script>

    </div>
</body>

</html>
