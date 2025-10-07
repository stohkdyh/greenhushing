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
        {{ __('Purchase Intention') }}
        <div
            class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800">
        </div>
    </div>
</div>

<!-- ================== Manipulation Check Modal ================== -->
<div id="manipulation-modal"
    class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all duration-300 scale-95"
        id="manipulation-modal-content">
        <div class="p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __('Please Answer First')}}</h3>

            <!-- Step Content -->
            <div id="manipulation-step" class="mb-6"></div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3">
                <!-- <button type="button" onclick="closeManipulationModal()"
                    class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                    Cancel
                </button> -->
                <button type="button" id="manipulation-next-btn" onclick="nextManipulationStep()"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    {{ __('Next') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ================== Rating Modal ================== -->
<div id="rating-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all duration-300 scale-95"
        id="modal-content">
        <div class="p-6">
            <!-- Header -->
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.519-4.674z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('Purchase Intention') }}</h3>
                <p class="text-gray-600 text-sm">
                    {{ __('From 1 to 10, what number best represents your feelings about buying this product?') }}
                </p>
            </div>

            <!-- Rating Scale -->
            <div class="mb-6">
                <div class="flex justify-between text-xs text-gray-500 mb-2">
                    <span>{{ __('Very Unlikely') }}</span>
                    <span>{{ __('Very Likely') }}</span>
                </div>
                <div class="grid grid-cols-10 gap-2">
                    @for ($i = 1; $i <= 10; $i++)
                        <button type="button"
                            class="rating-btn aspect-square rounded-lg border-2 border-gray-300 hover:border-blue-500 hover:bg-blue-50 transition-all duration-200 text-sm font-semibold"
                            data-rating="{{ $i }}" onclick="selectRating({{ $i }})">
                            {{ $i }}
                        </button>
                    @endfor
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3">
                <!-- <button type="button" onclick="closeRatingModal()"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    {{ __('Cancel') }}
                </button> -->
                <button type="button" id="submit-rating" onclick="submitRating()"
                    class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed"
                    disabled>
                    {{ __('Submit') }}
                </button>
            </div>
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
        <span id="success-text">{{ __('Rating submitted successfully!') }}</span>
    </div>
</div>
<script>
    // ================= GLOBAL VARS =================
    let selectedRating = null;
    let manipulationCurrentStep = 0;
    let manipulationProduct = null;
    let manipulationAnswers = [];
    // Add referrer tracking
    let previousPage = document.referrer || "{{ route('market') }}";

    // Ambil nama file dari URL (contoh: "neuphone.html")
    let path = window.location.pathname;
    let page = path.split("/").pop().toLowerCase(); // ambil nama file kecil semua

    // Default product
    let product = "Neuphone";

    // Tentukan nama product berdasarkan nama file
    if (page.includes("zeno")) {
        product = "Zenophone";
    } else if (page.includes("neu")) {
        product = "Neuphone";
    }

    // Daftar pertanyaan manipulasi dengan nama produk dinamis
    const manipulationQuestions = (product == "Zenophone") ? [
        "{{ __(':product presents a confusing message (using certain words and images) about its environmental behavior.')}}" .replace(':product', product),
        "{{ __(':product provides vague or seemingly unprovable environmental claims about its environmental performance.')}}".replace(':product', product),
        "{{ __(':product overstates or exaggerates its environmental behavior.') }}" .replace(':product', product),
        "{{ __('ZenoPhone omits or hides important information about its real environmental behavior.') }}" .replace(':product', product),
        "{{ __('The product deceives me by means of words in its environmental features') }}" .replace(':product', product),
        "{{ __('The product deceives me by means of visuals or graphics in its environmental features') }}" .replace(':product', product),
        "{{ __('The product deceives me by means of green claims that are unclear') }}" .replace(':product', product),
        "{{ __('The product exaggerates or overstates its green functionality') }}" .replace(':product', product),
        "{{ __('The product hides important information, making the green claim sound better than it is') }}" .replace(':product', product),
        
        
        "{{ __('The mission, vision and values of :product, visible on its website, clearly focus on transmitting its total commitment to the environment') }}".replace(':product', product),
        "{{ __(':product’s website has content on environmental aspects of the company') }}".replace(':product', product),
        "{{ __(':product is a clear example for the rest of the companies in the sector on how the environmental aspects in a company should be treated to guarantee low environmental impact.') }}".replace(':product', product),
        "{{ __(':product has good environmental performance') }}".replace(':product', product)
    ] 
    : 
    [
        "{{ __(':product does not disclose the negative environmental impact of its production or operational activities or related data.')}}" .replace(':product', product),
        "{{ __(':product does not disclose environmental data, monitoring results, or carbon emission information')}}" .replace(':product', product),
        "{{ __(':product does not disclose the achievements in environmental protection, energy conservation or emission reduction.')}}".replace(':product', product),
        

        "{{ __('The mission, vision and values of :product, visible on its website, clearly focus on transmitting its total commitment to the environment') }}".replace(':product', product),
        "{{ __(':product’s website has content on environmental aspects of the company') }}".replace(':product', product),
        "{{ __(':product is a clear example for the rest of the companies in the sector on how the environmental aspects in a company should be treated to guarantee low environmental impact.') }}".replace(':product', product),
        "{{ __(':product has good environmental performance') }}".replace(':product', product)
    ];

    console.log(manipulationQuestions);

    // ================= BUTTON HANDLER =================
    function handleRatingButtonClick(product) {
        // First check if this product has already been rated
        fetch(`{{ route('product.has.rated') }}?product=${product}`)
            .then(response => response.json())
            .then(data => {
                if (data.has_rated) {
                    // If already rated, just show a message
                    showSuccessMessage('{{ __('You have already rated this product') }}');

                    // Update button appearance if needed
                    const button = document.getElementById('rating-button');
                    if (button) {
                        button.classList.remove('animate-pulse', 'bg-blue-600');
                        button.classList.add('bg-green-600');
                    }
                    // Update tooltip to show the rating
                    const tooltip = document.getElementById('rating-tooltip');
                    if (tooltip) {
                        tooltip.innerHTML = `
                        {{ __('Your rating:') }} ${data.rating}/10
                        <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"></div>
                        `;
                    }
                    button.addEventListener('click', function() {
                        // Redirect to previous page or market
                        window.location.href = "{{ route('market') }}";
                    });
                } else {
                    // Not rated yet, proceed with rating flow
                    manipulationProduct = product;

                    // Check if this product needs manipulation check
                    if (['neuphone', 'zenophone'].includes(product)) {
                        openManipulationModal(product);
                    } else {
                        openRatingModal();
                    }
                }
            })
            .catch(error => {
                console.error('Error checking if product is rated:', error);
                // Fallback to normal flow if check fails
                if (['neuphone', 'zenophone'].includes(product)) {
                    openManipulationModal(product);
                } else {
                    openRatingModal();
                }
            });
    }

    // ================= MANIPULATION MODAL =================
    function openManipulationModal(product) {
        manipulationProduct = product;
        manipulationCurrentStep = 0;
        manipulationAnswers = [];
        document.getElementById('manipulation-modal').classList.remove('hidden');
        renderManipulationStep();
    }

    function closeManipulationModal() {
        document.getElementById('manipulation-modal').classList.add('hidden');
    }

    function renderManipulationStep() {
        const stepDiv = document.getElementById('manipulation-step');
        const currentAnswer = manipulationAnswers[manipulationCurrentStep] ?? null;

        stepDiv.innerHTML = `
            <p class="text-gray-700 mb-4">${manipulationQuestions[manipulationCurrentStep]}</p>
            <div class="flex gap-3">
                <button type="button" 
                    class="answer-btn flex-1 px-3 py-2 border rounded-lg  ${currentAnswer==='yes' ? 'bg-blue-500 text-white border-blue-500 hover:bg-blue-500'  : ''}" 
                    onclick="selectManipulationAnswer('yes')">{{ __('Yes') }}</button>
                <button type="button" 
                    class="answer-btn flex-1 px-3 py-2 border rounded-lg ${currentAnswer==='no' ? 'bg-blue-500 text-white border-blue-500 hover:bg-blue-500' : ''}" 
                    onclick="selectManipulationAnswer('no')">{{ __('No') }}</button>
            </div>
        `;

        const nextBtn = document.getElementById('manipulation-next-btn');
        nextBtn.textContent = (manipulationCurrentStep === manipulationQuestions.length - 1) ? "{{ __('Finish') }}" : "{{ __('Next') }}";
        nextBtn.disabled = !currentAnswer; // disable kalau belum pilih
    }

    function selectManipulationAnswer(answer) {
        manipulationAnswers[manipulationCurrentStep] = answer;
        renderManipulationStep(); // re-render biar highlight muncul
    }

    function nextManipulationStep() {
        if (!manipulationAnswers[manipulationCurrentStep]) return; // wajib pilih dulu

        if (manipulationCurrentStep < manipulationQuestions.length - 1) {
            manipulationCurrentStep++;
            renderManipulationStep();
        } else {
            closeManipulationModal();
            openRatingModal();
        }
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

    // ================= RATING MODAL =================
    document.addEventListener('DOMContentLoaded', function() {
        loadExistingRating();
    });

    function loadExistingRating() {
        fetch("{{ route('product.ratings.get') }}?product={{ $product }}")
            .then(response => response.json())
            .then(data => {
                if (data.rating) {
                    const button = document.getElementById('rating-button');
                    button.classList.remove('animate-pulse', 'bg-blue-600');
                    button.classList.add('bg-green-600');

                    document.getElementById('rating-tooltip').innerHTML = `
                        {{ __('Your rating:') }} ${data.rating}/10
                        <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"></div>
                    `;
                }
            })
            .catch(error => console.error('Error loading rating:', error));
    }

    function openRatingModal() {
        const modal = document.getElementById('rating-modal');
        const modalContent = document.getElementById('modal-content');

        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }, 10);

        selectedRating = null;
        updateRatingButtons();
        document.getElementById('submit-rating').disabled = true;
    }

    function closeRatingModal() {
        const modal = document.getElementById('rating-modal');
        const modalContent = document.getElementById('modal-content');

        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-95');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function selectRating(rating) {
        selectedRating = rating;
        updateRatingButtons();
        document.getElementById('submit-rating').disabled = false;
    }

    function updateRatingButtons() {
        const buttons = document.querySelectorAll('.rating-btn');
        buttons.forEach((btn, index) => {
            const rating = index + 1;
            if (selectedRating && rating <= selectedRating) {
                btn.classList.remove('border-gray-300', 'bg-white');
                btn.classList.add('border-blue-500', 'bg-blue-500', 'text-white');
            } else {
                btn.classList.remove('border-blue-500', 'bg-blue-500', 'text-white');
                btn.classList.add('border-gray-300', 'bg-white');
            }
        });
    }

    function submitRating() {
        if (!selectedRating) return;

        const submitBtn = document.getElementById('submit-rating');
        submitBtn.disabled = true;
        submitBtn.textContent = '{{ __('Submitting...') }}';

        fetch("{{ route('product.rating.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_name: "{{ $product }}",
                    rating: selectedRating,
                    manipulation: manipulationAnswers,
                    referrer: window.location
                        .pathname // Send current path to track where rating was submitted from
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeRatingModal();
                    showSuccessMessage(data.message);

                    const button = document.getElementById('rating-button');
                    button.classList.remove('animate-pulse', 'bg-blue-600');
                    button.classList.add('bg-green-600');

                    document.getElementById('rating-tooltip').innerHTML = `
                        {{ __('Your rating:') }} ${selectedRating}/10
                        <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"></div>
                    `;

                    // Improved redirection logic
                    setTimeout(() => {
                        // If this is a product detail or news page, go back to market
                        if (window.location.pathname.includes('/news/') || ['onephone', 'neuphone',
                                'xarelphone', 'zenophone'
                            ].some(p =>
                                window.location.pathname.includes(p))) {
                            window.location.href = "{{ route('market') }}";
                        } else if (data.redirect_url) {
                            // Otherwise use the server-provided URL
                            window.location.href = data.redirect_url;
                        }
                    }, 1500);
                } else {
                    alert(data.message || '{{ __('Error submitting rating') }}');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('{{ __('Error submitting rating') }}');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.textContent = '{{ __('Submit') }}';
            });
    }

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

        // ================= CLOSE MODALS =================
        document.getElementById('manipulation-modal').addEventListener('click', function(e) {
            // hanya berlaku saat step pertama
            if (manipulationCurrentStep === 0 && e.target === this) {
                closeManipulationModal();
            }
        });

        // ================= CLOSE MODALS ================= // 
        document.getElementById('rating-modal').addEventListener('click', function(e) { 
            if (e.target === this) { 
            closeRatingModal(); 
            } 
        });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeRatingModal();
            closeManipulationModal();
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Store the page that brought us here (for returning later)
        if (document.referrer && document.referrer !== "") {
            previousPage = document.referrer;
            // Don't save referrers from outside the app
            if (!previousPage.includes(window.location.host)) {
                previousPage = "{{ route('market') }}";
            }
        }

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

                    // Update tooltip to show the rating
                    const tooltip = document.getElementById('rating-tooltip');
                    if (tooltip) {
                        tooltip.innerHTML = `
                            {{ __('Your rating:') }} ${data.rating}/10
                            <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"></div>
                        `;
                    }
                }
            })
            .catch(error => console.error('Error checking if product is rated:', error));
    });
</script>
