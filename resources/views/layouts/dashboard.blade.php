<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <title>Dashboard Admin</title>

    <style>
        .active {
            background-color: #5DB9FF;
            color: white !important;
        }
    </style>

</head>

<body class="bg-gray-100 font-poppins">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('admin.components.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col p-5">
            <!-- Navbar -->
            @include('admin.components.navbar')

            <!-- Content -->
            <div class="flex-1 py-5 overflow-auto">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
    <script>
        AOS.init();

        // Toggle Sidebar Functionality
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const sidebarTitle = document.getElementById('sidebarTitle');
        const sidebarTexts = document.querySelectorAll('.sidebar-text');

        let isSidebarCollapsed = false;

        toggleSidebar.addEventListener('click', () => {
            isSidebarCollapsed = !isSidebarCollapsed;

            if (isSidebarCollapsed) {
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-16');
                sidebarTitle.classList.add('hidden');
                sidebarTexts.forEach(text => text.classList.add('hidden'));

                const links = sidebar.querySelectorAll('ul li a');
                links.forEach(link => {
                    link.classList.add('justify-center');
                });
            } else {
                sidebar.classList.remove('w-16');
                sidebar.classList.add('w-64');
                sidebarTitle.classList.remove('hidden');
                sidebarTexts.forEach(text => text.classList.remove('hidden'));

                const links = sidebar.querySelectorAll('ul li a');
                links.forEach(link => {
                    link.classList.remove('justify-center');
                });
            }
        });

        // Sidebar Active State Functionality
        const sidebarItems = document.querySelectorAll('.sidebar-item');

        sidebarItems.forEach(item => {
            item.addEventListener('click', () => {

                sidebarItems.forEach(i => i.classList.remove('active'));


                item.classList.add('active');
            });
        });
    </script>
</body>

</html>
