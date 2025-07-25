<footer class="bg-white text-black py-10 px-4">
    <div class="max-w-7xl mx-auto space-y-8">
        <!-- Bagian atas: Onephone + Form -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 text-sm text-gray-600">
            <!-- Judul Brand -->
            <h2 class="text-2xl font-bold text-black">Onephone</h2>

            <!-- Form + Tombol -->
            <form action="#" class="flex items-center border-b border-gray-400 focus-within:border-green-600 max-w-md w-full">
                <input 
                    type="email" 
                    placeholder="Enter your email" 
                    class="flex-grow px-2 py-2 bg-transparent border-none text-black placeholder-gray-400 focus:outline-none" />
                <button 
                    type="submit"
                    class="ml-2 px-4 py-2 rounded-3xl text-sm text-black border border-black font-medium hover:text-green-900 transition">
                    Sign Up
                </button>
            </form>
        </div>

        <!-- Bagian tengah: Menu Horizontal -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-sm text-gray-600">
            <!-- Support -->
            <div>
                <h3 class="text-black font-semibold mb-3">Support</h3>
                <ul class="space-y-2 ml-1">
                    <li><a href="/" class="hover:underline hover:text-black">Contact Us</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">User Guide</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Warranty</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">International Warranty</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Scooter Safety Notice</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Android Enterprise Recommended</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Digital Services Act</a></li>
                </ul>
            </div>

            <!-- About Us -->
            <div>
                <h3 class="text-black font-semibold mb-3">About Us</h3>
                <ul class="space-y-2 ml-1">
                    <li><a href="/" class="hover:underline hover:text-black">Onephone</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Management Team</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Privacy Policy</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Integrity & Compliance</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Investor Relations</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">ESG and Sustainability</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Trust Center</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Accessibility</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">HyperOS</a></li>
                </ul>
            </div>

            <!-- Products -->
            <div>
                <h3 class="text-black font-semibold mb-3">Products</h3>
                <ul class="space-y-2 ml-1">
                    <li><a href="/" class="hover:underline hover:text-black">Onephone</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Onephone with /e/os</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Onebuds</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Spare Parts</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Giftcard</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Where to Buy</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Promotions</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-black font-semibold mb-3">Services</h3>
                <ul class="space-y-2 ml-1">
                    <li><a href="/" class="hover:underline hover:text-black">Refer a Friend</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Getting Started</a></li>
                </ul>
            </div>
        </div>

        <!-- Bagian bawah -->
        <div class="border-t border-gray-300 pt-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Onephone. All rights reserved.
        </div>
    </div>
</footer>
