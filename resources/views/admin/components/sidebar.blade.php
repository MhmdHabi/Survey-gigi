<div id="sidebar" class="w-64 bg-white shadow-md transition-all duration-300 ease-in-out">
    <div class="p-4 flex justify-end mx-auto items-center">
        <button id="toggleSidebar" class="focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <h1 id="sidebarTitle" class="text-xl px-5 font-bold text-blue-600">Admin Dashboard</h1>
    <ul class="mt-6 space-y-4">
        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item 
                {{ request()->is('admin/dashboard') ? 'bg-[#5DB9FF] text-white' : '' }}"
                id="dashboardLink">
                <i class="fas fa-tachometer-alt mr-2"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('surveys.index') }}"
                class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item 
                {{ request()->is('admin/survey') ? 'bg-[#5DB9FF] text-white' : '' }}"
                id="usersLink">
                <i class="fas fa-users mr-2"></i>
                <span class="sidebar-text">Survey</span>
            </a>
        </li>
        <li>
            <a href="{{ route('survey.response.result') }}"
                class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item 
                {{ request()->is('admin/surveys/user') ? 'bg-[#5DB9FF] text-white' : '' }}"
                id="usersLink">
                <i class="fas fa-users mr-2"></i>
                <span class="sidebar-text">User Survey</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item 
                {{ request()->is('admin/users') ? 'bg-[#5DB9FF] text-white' : '' }}"
                id="usersLink">
                <i class="fas fa-users mr-2"></i>
                <span class="sidebar-text">Users</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.artikel') }}"
                class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item 
                {{ request()->is('admin/artikel') ? 'bg-[#5DB9FF] text-white' : '' }}"
                id="articlesLink">
                <i class="fas fa-file-alt mr-2"></i>
                <span class="sidebar-text">Artikel</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item
                {{ request()->is('admin/logout') ? 'bg-[#5DB9FF] text-white' : '' }}"
                id="logoutLink">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <span class="sidebar-text">Logout</span>
            </a>
        </li>
    </ul>
</div>
