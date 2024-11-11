<nav class="fixed top-0 left-0 w-full bg-white text-[#5DB9FF] py-4 px-8 lg:px-16 shadow-lg z-30">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" id="logo" class="flex items-center space-x-1">
            <img src="{{ asset('assets/logo1.png') }}" alt="My App Logo" class="h-10 lg:h-12">
            <img src="{{ asset('assets/logo2.png') }}" alt="My App Logo" class="h-10 lg:h-12">
            <img src="{{ asset('assets/logo-image.png') }}" alt="My App Logo" class="h-10 lg:h-12">
        </a>

        <!-- Desktop Menu -->
        <ul class="hidden lg:flex space-x-5 items-center">
            <li>
                <a href="{{ route('home') }}"
                    class=" uppercase font-[500] font-poppins 
                          {{ request()->routeIs('home') ? 'border-b-2 border-[#5DB9FF]' : '' }}">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}"
                    class=" uppercase font-[500] font-poppins 
                          {{ request()->routeIs('about') ? 'border-b-2 border-[#5DB9FF]' : '' }}">
                    Tentang Kami
                </a>
            </li>
            <li>
                <a href="{{ route('artikel') }}"
                    class=" uppercase font-[500] font-poppins 
                          {{ request()->routeIs('artikel') ? 'border-b-2 border-[#5DB9FF]' : '' }}">
                    Artikel
                </a>
            </li>
            @auth

                <li>
                    <a href="{{ route('survey.results') }}"
                        class=" uppercase font-[500] font-poppins 
                          {{ request()->routeIs('survey.results') ? 'border-b-2 border-[#5DB9FF]' : '' }}">
                        Hasil Survey
                    </a>
                </li>
            @endauth
        </ul>

        <!-- Login -->
        @auth
            <!-- User Avatar with Dropdown -->
            <div class="relative hidden lg:block">
                <button id="user-menu"
                    class="flex items-center justify-center w-10 h-10 rounded-full bg-[#5DB9FF] text-white focus:outline-none">
                    <!-- Placeholder for user avatar -->
                    <span class="font-semibold">{{ auth()->user()->name[0] }}</span>
                </button>
                <div id="dropdown" class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg hidden">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}"
                class="relative hidden lg:inline-block px-6 py-1 border border-[#5DB9FF] text-[#5DB9FF] rounded-full overflow-hidden group">
                <span
                    class="absolute inset-0 w-full h-full bg-[#5DB9FF] transform -translate-x-full transition-transform duration-300 ease-in-out group-hover:translate-x-0"></span>
                <span
                    class="relative z-10 transition-colors font-[500] font-poppins duration-300 ease-in-out group-hover:text-white">
                    Masuk</span>
            </a>
        @endauth

        <!-- Mobile Menu Button -->
        <button id="drawer-toggle" class="lg:hidden text-[#5DB9FF] focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
</nav>

<!--  Mobile Menu -->
<div id="drawer"
    class="fixed inset-0 bg-gray-800 bg-opacity-75 z-40 hidden transition-opacity duration-300 ease-in-out">
    <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-50 p-6 transform -translate-x-full transition-transform duration-300 ease-in-out"
        id="drawer-content">
        <!-- Close Button -->
        <button id="drawer-close" class="text-gray-600 focus:outline-none mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <ul class="space-y-4 text-lg font-[500]">
            <li><a href="{{ route('home') }}"
                    class="text-gray-800 hover:text-blue-600 
                       {{ request()->routeIs('home') ? 'border-b-2 border-[#5DB9FF]' : '' }}">Beranda</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class="text-gray-800 hover:text-blue-600 
                       {{ request()->routeIs('about') ? 'border-b-2 border-[#5DB9FF]' : '' }}">Tentang
                    Kami</a></li>
            <li><a href="{{ route('artikel') }}"
                    class="text-gray-800 hover:text-blue-600 
                       {{ request()->routeIs('artikel') ? 'border-b-2 border-[#5DB9FF]' : '' }}">Artikel</a>
            </li>
            @auth

                <li><a href="{{ route('survey.results') }}"
                        class="text-gray-800 hover:text-blue-600 
                       {{ request()->routeIs('artikel') ? 'border-b-2 border-[#5DB9FF]' : '' }}">Hasil
                        Survey</a>
                </li>
            @endauth


            <li>
                @auth
                    <div class=" bg-blue-100 rounded-md shadow-lg ">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="relative inline-block px-6 py-1 border border-[#5DB9FF] text-black rounded-full overflow-hidden group">
                        <span
                            class="absolute inset-0 w-full h-full bg-[#5DB9FF] transform -translate-x-full transition-transform duration-300 ease-in-out group-hover:translate-x-0"></span>
                        <span
                            class="relative z-10 transition-colors duration-300 ease-in-out group-hover:text-[#5DB9FF]">Masuk</span>
                    </a>
                @endauth
            </li>
        </ul>
    </div>
</div>

<script>
    // Smooth Scroll Function
    function smoothScroll(target) {
        const targetPosition = target.getBoundingClientRect().top + window.scrollY;
        const startPosition = window.scrollY;
        const distance = targetPosition - startPosition;
        const duration = 700;
        let startTime = null;

        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const progress = Math.min(timeElapsed / duration, 1);

            // Easing function for smooth effect
            const ease = progress < 0.5 ?
                2 * progress * progress :
                -1 + (4 - 2 * progress) * progress;

            window.scrollTo(0, startPosition + distance * ease);

            if (timeElapsed < duration) {
                requestAnimationFrame(animation);
            }
        }

        requestAnimationFrame(animation);
    }

    // Event listener for logo
    document.getElementById('logo').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent reload
        smoothScroll(document.documentElement);
    });

    // Drawer code
    const drawer = document.getElementById('drawer');
    const drawerContent = document.getElementById('drawer-content');

    document.getElementById('drawer-toggle').addEventListener('click', function() {
        drawer.classList.remove('hidden');
        drawerContent.offsetHeight; // Trigger reflow
        drawerContent.classList.remove('-translate-x-full');
        drawer.classList.add('opacity-100');
    });

    document.getElementById('drawer-close').addEventListener('click', function() {
        drawerContent.classList.add('-translate-x-full');
        drawer.classList.remove('opacity-100');
        setTimeout(() => {
            drawer.classList.add('hidden');
        }, 300);
    });

    // User Dropdown Toggle
    const userMenuButton = document.getElementById('user-menu');
    const dropdown = document.getElementById('dropdown');

    userMenuButton.addEventListener('click', function() {
        dropdown.classList.toggle('hidden'); // Toggle visibility
    });

    // Close dropdown if clicking outside
    document.addEventListener('click', function(event) {
        if (!userMenuButton.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
