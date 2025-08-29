<!-- Floating News Button -->
<div id="floating-news-container" class="fixed bottom-8 right-8 z-50">
    <!-- Main Floating Button -->
    <button id="news-button"
        class="bg-blue-600 hover:bg-blue-700 text-white rounded-full p-4 shadow-lg transition-all duration-300 transform hover:scale-110 animate-pulse"
        onclick="goToNews('{{ $product }}')">
        <!-- Ikon News -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h9l2 2h3a2 2 0 012 2v10a2 2 0 01-2 2z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6M9 16h6M9 8h.01M13 8h2" />
        </svg>
    </button>

    <!-- Tooltip -->
    <div id="news-tooltip"
        class="absolute bottom-16 right-0 bg-gray-800 text-white text-sm rounded-lg px-3 py-2 opacity-0 transition-opacity duration-300 whitespace-nowrap">
        {{ __('Go to News') }}
        <div
            class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800">
        </div>
    </div>
</div>

<script>
    function goToNews(product) {
        window.location.href = '/' + product + '-news';
    }

    // Tooltip tetap jalan
    document.getElementById('news-button').addEventListener('mouseenter', function () {
        document.getElementById('news-tooltip').classList.remove('opacity-0');
        document.getElementById('news-tooltip').classList.add('opacity-100');
    });

    document.getElementById('news-button').addEventListener('mouseleave', function () {
        document.getElementById('news-tooltip').classList.add('opacity-0');
        document.getElementById('news-tooltip').classList.remove('opacity-100');
    });
</script>
