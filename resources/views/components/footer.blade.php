<footer class="bg-blue-500 text-white py-8 mt-auto">
    <div class="container mx-auto px-4 md:px-8 lg:px-16">

        <!-- Top Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-6 md:space-y-0">

            <!-- Logo and Name -->
            <div class="flex items-center">
                <img src="{{ asset('assets/logo-image.png') }}" alt="Website Logo"
                    class="h-20 mr-3 opacity-90 filter hue-rotate-15">
                <div>
                    <h2 class="text-lg font-semibold">ECC Denth</h2>
                    <p class="text-sm text-gray-300">Early Childhood Caries Dental Technology</p>
                </div>
            </div>


            <!-- Navigation Links (Centered) -->
            <div class="flex justify-center space-x-6">
                <a href="{{ route('home') }}" class="text-white hover:text-gray-300">Home</a>
                <a href="{{ route('about') }}" class="text-white hover:text-gray-300">Tentang Kami</a>
                <a href="{{ route('artikel') }}" class="text-white hover:text-gray-300">Artikel</a>
            </div>

            <!-- Supported By and Social Links -->
            <div class="flex flex-col items-center space-y-3 md:space-y-0 md:space-x-4">
                <div class="flex items-center mb-2">
                    <span class="text-sm text-white mr-2">Supported by</span>
                    <img src="{{ asset('assets/logo1.png') }}" alt="Supported Logo"
                        class="h-8 w-8 opacity-90 filter hue-rotate-15">
                    <img src="{{ asset('assets/logo2.png') }}" alt="Supported Logo"
                        class="h-8 w-8 opacity-90 filter hue-rotate-15">
                </div>
                <div class="flex space-x-4">
                    <a href="" target="_blank" class="text-white text-2xl hover:text-gray-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" target="_blank" class="text-white text-2xl hover:text-gray-300">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" target="_blank" class="text-white text-2xl hover:text-gray-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <hr class="border-t border-white opacity-30 mb-4">

        <!-- Copyright -->
        <p class="text-xs text-center lg:text-left font-medium text-white">&copy; 2024 Ecc Dentch. All rights reserved.
        </p>
    </div>
</footer>
