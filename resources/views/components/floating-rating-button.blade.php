@props(['product'])

<!-- Floating Rating Button -->
<div id="floating-rating-container" class="fixed bottom-8 right-8 z-50">
    <!-- Main Floating Button -->
    <button id="rating-button"
        class="bg-blue-600 hover:bg-blue-700 text-white rounded-full p-4 shadow-lg transition-all duration-300 transform hover:scale-110 animate-pulse"
        onclick="handleRatingButtonClick('{{ $product }}')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.519-4.674z" />
        </svg>
    </button>

    <!-- Tooltip -->
    <div id="rating-tooltip"
        class="absolute bottom-16 right-0 bg-gray-800 text-white text-sm rounded-lg px-3 py-2 opacity-0 transition-opacity duration-300 whitespace-nowrap">
        {{ __('Post Test') }}
        <div
            class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800">
        </div>
    </div>
</div>

<!-- Success Message -->
<div id="success-message"
    class="fixed top-4 right-4 bg-green-600 text-white px-4 py-3 rounded-lg shadow-lg z-50 hidden transform transition-all duration-300 translate-x-full">
    <div class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <span id="success-text">{{ __('Redirecting to post-test...') }}</span>
    </div>
</div>

<script>
    // ================= BUTTON HANDLER =================
    function handleRatingButtonClick(product) {
        // First check if this product has already been rated
        fetch(`{{ route('product.has.rated') }}?product=${product}`)
            .then(response => response.json())
            .then(data => {
                if (data.has_rated) {
                    // If already completed post-test, just show a message
                    showSuccessMessage('{{ __('You have already completed post-test for this product') }}');
                    
                    setTimeout(() => {
                        // Go back to market
                        window.location.href = "{{ route('market') }}";
                    }, 1500);
                } else {
                    // Not rated yet, go to post-test
                    showSuccessMessage('{{ __('Redirecting to post-test...') }}');
                    
                    setTimeout(() => {
                        window.location.href = `/post-test/${product}`;
                    }, 1000);
                }
            })
            .catch(error => {
                console.error('Error checking product:', error);
                // Fallback in case of error
                window.location.href = `/post-test/${product}`;
            });
    }

    // ================= TOOLTIP =================
    document.getElementById('rating-button').addEventListener('mouseenter', function() {
        document.getElementById('rating-tooltip').classList.remove('opacity-0');
        document.getElementById('rating-tooltip').classList.add('opacity-100');
    });

    document.getElementById('rating-button').addEventListener('mouseleave', function() {
        document.getElementById('rating-tooltip').classList.add('opacity-0');
        document.getElementById('rating-tooltip').classList.remove('opacity-100');
    });

    function showSuccessMessage(message) {
        const successMessage = document.getElementById('success-message');
        const successText = document.getElementById('success-text');

        successText.textContent = message;
        successMessage.classList.remove('hidden', 'translate-x-full');
        successMessage.classList.add('translate-x-0');

        setTimeout(() => {
            successMessage.classList.remove('translate-x-0');
            successMessage.classList.add('translate-x-full');

            setTimeout(() => {
                successMessage.classList.add('hidden');
            }, 300);
        }, 3000);
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Check if current product has already been rated
        fetch(`{{ route('product.has.rated') }}?product={{ $product }}`)
            .then(response => response.json())
            .then(data => {
                if (data.has_rated) {
                    // Update button appearance
                    const button = document.getElementById('rating-button');
                    if (button) {
                        button.classList.remove('animate-pulse', 'bg-blue-600');
                        button.classList.add('bg-green-600');
                    }
                }
            })
            .catch(error => console.error('Error checking if product is rated:', error));
    });
</script>
