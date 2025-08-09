<footer class="bg-[#1C2D3C] text-white py-10 px-4">
    <div class="max-w-7xl mx-auto space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 text-sm">
            <!-- Brand -->
            <div class="flex flex-col items-start">
                <h2 class="text-3xl font-bold text-white">Xarelphone</h2>
                <img src="images/logo_claim_green.png" alt="logo onephone" class="h-16 mt-1 w-auto">
            </div>

            <!-- Newsletter -->
            <div class="max-w-md w-full md:ml-4">
                <h3 class="text-white font-semibold">Xarelphone Newsletter</h3>
                <p class="text-white/70 mb-4 text-sm">Stay up to date with the latest news and stories from Xarelphone.</p>

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
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-sm text-white">
            <!-- Support -->
            <div>
                <h3 class="text-white font-bold mb-3">Support</h3>
                <ul class="space-y-2 font-light ml-1">
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
                <h3 class="text-white font-bold mb-3">About Us</h3>
                <ul class="space-y-2 font-light ml-1">
                    <li><a href="/" class="hover:underline hover:text-black">Xarelphone</a></li>
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
                <h3 class="text-white font-bold mb-3">Products</h3>
                <ul class="space-y-2 font-light ml-1">
                    <li><a href="/" class="hover:underline hover:text-black">Xarelphone</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Xarelphone with /e/os</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Onebuds</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Spare Parts</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Giftcard</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Where to Buy</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Promotions</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-white font-bold mb-3">Services</h3>
                <ul class="space-y-2 font-light ml-1">
                    <li><a href="/" class="hover:underline hover:text-black">Refer a Friend</a></li>
                    <li><a href="/" class="hover:underline hover:text-black">Getting Started</a></li>
                </ul>
            </div>
        </div>

        <!-- Bagian bawah -->
        <div class="border-t border-gray-300 pt-4 text-center text-sm text-white font-light">
            &copy; {{ date('Y') }} Xarelphone. All rights reserved.
        </div>
    </div>
</footer>
