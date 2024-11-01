<nav class="bg-white rounded shadow sticky top-0 z-10">
    <div class="flex justify-between items-center p-4">
        <div class="text-lg font-semibold text-gray-800">Navbar</div>
        <div class="flex items-center space-x-2 lg:hidden relative">
            <button id="userIcon" class="flex items-center focus:outline-none">
                <i class="fas fa-user text-gray-800 text-2xl"></i> <!-- Increased size -->
                <i class="fas fa-chevron-down text-gray-800 ml-1"></i> <!-- Arrow icon -->
            </button>
            <!-- Dropdown Menu -->
            <div id="dropdownMenu" class="absolute right-0 mt-20 w-48 bg-white border rounded shadow-md hidden">
                <form id="dropdownLogoutForm" action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('dropdownLogoutForm').submit();"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-200">
                        Logout
                    </a>
                </form>
            </div>

        </div>
        <div class="hidden lg:flex items-center space-x-4">
            <span class="text-gray-600">Welcome, Admin</span>
            <form id="dropdownLogoutForm" action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <a href="#"
                    onclick="event.preventDefault(); document.getElementById('dropdownLogoutForm').submit();"
                    class="text-blue-500">Logout</a>
            </form>
        </div>
    </div>
</nav>

<!-- JavaScript for dropdown functionality -->
<script>
    const userIcon = document.getElementById('userIcon');
    const dropdownMenu = document.getElementById('dropdownMenu');

    userIcon.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden'); // Toggle dropdown visibility
    });

    // Close dropdown if clicked outside
    window.addEventListener('click', (event) => {
        if (!userIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>
