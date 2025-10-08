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
                                <div id="progress-bar" class="bg-blue-600 h-2 rounded-full transition-all duration-300"
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
        let finalProductSelected = false;

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
        });

        function loadRatedProducts() {
            fetch('{{ route('product.ratings.get') }}')
                .then(response => response.json())
                .then(data => {
                    ratedProducts = data.rated_products || [];
                    updateProductCards();
                    updateProgressBar();

                    // Check if final product is already selected
                    fetch('{{ route('final.product.get') }}')
                        .then(response => response.json())
                        .then(finalData => {
                            if (finalData.success && finalData.final_product) {
                                finalProductSelected = true;
                                markFinalProduct(finalData.final_product);
                            }

                            // Only show final selection modal if all products are rated but final product isn't selected yet
                            if (ratedProducts.length >= {{ count($products) }} && !finalProductSelected) {
                                showFinalSelectionModal();
                            }
                        })
                        .catch(error => console.error('Error checking final product:', error));
                })
                .catch(error => console.error('Error loading rated products:', error));
        }

        function updateProductCards() {
            const productCards = document.querySelectorAll('.product-card');

            productCards.forEach(card => {
                const productName = card.dataset.product;

                if (ratedProducts.includes(productName)) {
                    // Apply rated styling but keep product links active
                    card.classList.add('rated');
                    card.style.filter = 'grayscale(25%)';
                    card.style.opacity = '0.9';

                    // Show rated overlay
                    const overlay = card.querySelector('.rated-overlay');
                    if (overlay) {
                        overlay.classList.remove('hidden');
                    }

                    // Update choose button but keep it clickable for viewing product details
                    const chooseBtn = card.querySelector('.choose-product-btn');
                    if (chooseBtn) {
                        chooseBtn.classList.remove('bg-red-500', 'hover:bg-red-600');
                        chooseBtn.classList.add('bg-green-500', 'hover:bg-green-600');
                        chooseBtn.textContent = '{{ __('View Details') }}';
                    }
                }
            });
        }

        function markFinalProduct(productName) {
            // Find the product card for the final selected product
            const finalCard = document.querySelector(`[data-product="${productName}"]`);

            if (finalCard) {
                // Reset styling for all cards
                document.querySelectorAll('.product-card').forEach(card => {
                    // Remove any final product indicators
                    const finalBadge = card.querySelector('.final-product-badge');
                    if (finalBadge) finalBadge.remove();

                    // Restore normal opacity for rated products
                    if (card.classList.contains('rated')) {
                        card.style.filter = 'grayscale(25%)';
                        card.style.opacity = '0.9';
                    }
                });

                // Add final product badge
                const badgeContainer = document.createElement('div');
                badgeContainer.className =
                    'final-product-badge absolute top-3 right-3 bg-purple-600 text-white rounded-full px-3 py-1 text-xs font-bold z-20';
                badgeContainer.innerHTML = '{{ __('Final Choice') }}';
                finalCard.appendChild(badgeContainer);

                // Update styling for final product
                finalCard.style.filter = 'none';
                finalCard.style.opacity = '1';
                finalCard.classList.add('ring-2', 'ring-purple-500');

                // Update button
                const chooseBtn = finalCard.querySelector('.choose-product-btn');
                if (chooseBtn) {
                    chooseBtn.classList.remove('bg-green-500', 'hover:bg-green-600', 'bg-red-500', 'hover:bg-red-600');
                    chooseBtn.classList.add('bg-purple-600', 'hover:bg-purple-700');
                    chooseBtn.textContent = '{{ __('Your Final Choice') }}';
                }
            }
        }

        function updateProgressBar() {
            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');
            const progressBarMobile = document.getElementById('progress-bar-mobile');
            const progressTextMobile = document.getElementById('progress-text-mobile');

            // Adjust for 2 products instead of 4
            const totalProducts = {{ count($products) }};
            const ratedCount = ratedProducts.length;
            const progressPercentage = (ratedCount / totalProducts) * 100;

            // Update desktop progress
            if (progressBar) {
                progressBar.style.width = progressPercentage + '%';
            }
            if (progressText) {
                progressText.textContent = `${ratedCount}/${totalProducts} {{ __('rated') }}`;
            }

            // Update mobile progress
            if (progressBarMobile) {
                progressBarMobile.style.width = progressPercentage + '%';
            }
            if (progressTextMobile) {
                progressTextMobile.textContent = `${ratedCount}/${totalProducts} {{ __('rated') }}`;
            }
        }

        // Modified showFinalSelectionModal function to preserve selection state
        function showFinalSelectionModal() {
            // Create modal if it doesn't exist
            let finalSelectionModal = document.getElementById('final-selection-modal');

            if (!finalSelectionModal) {
                finalSelectionModal = document.createElement('div');
                finalSelectionModal.id = 'final-selection-modal';
                finalSelectionModal.className =
                    'fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4';
            }

            // Update modal content
            finalSelectionModal.innerHTML = `
                <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full mx-4 p-6 text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('All Products Rated!') }}</h3>
                    <p class="text-gray-600 mb-6">
                        {{ __('You have rated all products. Now please select one final product you would like to purchase.') }}
                    </p>

                    <div class="grid grid-cols-2 gap-6 mb-6">
                        ${ratedProducts.map(product => `
                                    <div> 
                                        <button onclick="preSelectFinalProduct('${product}')" 
                                            id="product-option-${product}"
                                            class="final-product-option w-full p-4 border rounded-lg hover:bg-purple-50 hover:border-purple-400 transition-all duration-200 ${selectedFinalProduct === product ? 'ring-2 ring-purple-500 bg-purple-50' : ''}">
                                            <img src="${getProductImagePath(product)}" class="w-20 h-20 object-contain mx-auto mb-2" alt="${product}">
                                            <p class="font-medium capitalize">${product}</p>
                                        </button>
                                        <a href="/${product}" class="text-sm text-blue-600 hover:underline block mt-1">{{ __('View Product Details') }}</a>
                                    </div>
                                `).join('')}
                    </div>

                    <div class="mt-6">
                        <button id="confirm-final-product" 
                            class="${selectedFinalProduct ? 'bg-purple-600 hover:bg-purple-700 text-white' : 'bg-gray-300 text-gray-500 cursor-not-allowed'} px-6 py-2 rounded-lg transition-colors w-full"
                            ${selectedFinalProduct ? '' : 'disabled'}>
                            {{ __('Confirm Selection') }}
                        </button>
                    </div>

                    <p class="text-sm text-gray-500 mt-4">{{ __('This choice will complete your product selection process.') }}</p>
                </div>
            `;

            // Append to body if needed
            if (!finalSelectionModal.parentElement) {
                document.body.appendChild(finalSelectionModal);
            } else {
                finalSelectionModal.classList.remove('hidden');
            }

            // Reattach click handler to confirm button if we have a selection
            if (selectedFinalProduct) {
                const confirmBtn = document.getElementById('confirm-final-product');
                if (confirmBtn) {
                    confirmBtn.onclick = function() {
                        showFinalConfirmation(selectedFinalProduct);
                    };
                }
            }
        }

        // Add this new function to handle pre-selection
        let selectedFinalProduct = null;

        function preSelectFinalProduct(productName) {
            // Store selected product
            selectedFinalProduct = productName;

            // Update UI to show selected product
            document.querySelectorAll('.final-product-option').forEach(btn => {
                // Reset all buttons to default state
                btn.classList.remove('ring-2', 'ring-purple-500', 'bg-purple-50');
            });

            // Highlight selected product
            const selectedBtn = document.getElementById(`product-option-${productName}`);
            if (selectedBtn) {
                selectedBtn.classList.add('ring-2', 'ring-purple-500', 'bg-purple-50');
            }

            // Enable confirm button
            const confirmBtn = document.getElementById('confirm-final-product');
            if (confirmBtn) {
                confirmBtn.classList.remove('bg-gray-300', 'text-gray-500', 'cursor-not-allowed');
                confirmBtn.classList.add('bg-purple-600', 'hover:bg-purple-700', 'text-white');
                confirmBtn.disabled = false;

                // Add click handler for confirmation
                confirmBtn.onclick = function() {
                    if (selectedFinalProduct) {
                        // Show confirmation dialog
                        showFinalConfirmation(selectedFinalProduct);
                    }
                };
            }
        }

        // Update the showFinalConfirmation function in market.blade.php
        function showFinalConfirmation(productName) {
            const finalSelectionModal = document.getElementById('final-selection-modal');

            finalSelectionModal.innerHTML = `
                <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 p-6 text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('Confirm Your Choice') }}</h3>
                    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                        <img src="${getProductImagePath(productName)}" class="w-20 h-20 object-contain mx-auto mb-2" alt="${productName}">
                        <p class="font-medium capitalize">${productName}</p>
                    </div>
                    <p class="text-gray-600 mb-6">
                        {{ __('Are you sure you want to select this product as your final choice?') }}<br>
                        <span class="text-sm text-yellow-600">{{ __('This action cannot be undone.') }}</span>
                    </p>
                    <div class="flex space-x-3">
                        <button onclick="showFinalSelectionModal()" class="flex-1 bg-gray-200 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                            {{ __('Back') }}
                        </button>
                        <button onclick="selectFinalProduct('${productName}')" class="flex-1 bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            `;
        }

        function getProductImagePath(productName) {
            // Map product names to their image paths
            const imageMap = {
                'onephone': '{{ asset('images/market_one.png') }}',
                'neuphone': '{{ asset('images/market_neu.png') }}',
                'xarelphone': '{{ asset('images/market_xarel.png') }}',
                'zenophone': '{{ asset('images/market_zeno.png') }}'
            };

            return imageMap[productName] || '';
        }

        function selectFinalProduct(productName) {
            // Show loading state
            const finalSelectionModal = document.getElementById('final-selection-modal');
            finalSelectionModal.innerHTML = `
                <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 p-6 text-center">
                    <div class="animate-spin w-12 h-12 border-4 border-purple-500 border-t-transparent rounded-full mx-auto mb-4"></div>
                    <p class="text-gray-600">{{ __('Saving your selection...') }}</p>
                </div>
            `;

            // Send selection to server
            fetch('{{ route('final.product.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_name: productName
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Server returned ${response.status}: ${response.statusText}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        finalProductSelected = true;
                        markFinalProduct(productName);

                        // Update modal to show success and redirect
                        finalSelectionModal.innerHTML = `
                            <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 p-6 text-center">
                                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('Thank You!') }}</h3>
                                <p class="text-gray-600 mb-6">
                                    {{ __('Your final product choice has been recorded. Redirecting to post-test in') }}
                                    <span id="final-countdown" class="font-bold text-blue-600">5</span>
                                    {{ __('seconds...') }}
                                </p>
                                <button onclick="redirectToPostTest()" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                    {{ __('Continue Now') }}
                                </button>
                            </div>
                        `;

                        // Start countdown
                        let countdown = 5;
                        const countdownElement = document.getElementById('final-countdown');

                        const timer = setInterval(() => {
                            countdown--;
                            countdownElement.textContent = countdown;

                            if (countdown <= 0) {
                                clearInterval(timer);
                                redirectToPostTest();
                            }
                        }, 1000);
                    } else {
                        // Show error from server
                        throw new Error(data.message || 'Unknown error occurred');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);

                    // Show error in modal
                    finalSelectionModal.innerHTML = `
                        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 p-6 text-center">
                            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('Error') }}</h3>
                            <p class="text-gray-600 mb-6">
                                {{ __('Could not save your selection. Please try again.') }}<br>
                                <span class="text-sm text-red-500">${error.message}</span>
                            </p>
                            <button onclick="showFinalSelectionModal()" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                {{ __('Try Again') }}
                            </button>
                        </div>
                    `;
                });
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

            // Check if all products are rated (adjust for 2 products)
            const totalProducts = {{ count($products) }};
            if (ratedProducts.length >= totalProducts && !finalProductSelected) {
                setTimeout(() => {
                    showFinalSelectionModal();
                }, 1000);
            }
        };
    </script>

    </div>
</body>

</html>
