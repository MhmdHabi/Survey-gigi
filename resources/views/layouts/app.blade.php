<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-2">
            <div class="flex justify-between items-center">
                <a class="text-xl font-bold" href="/">Survey App</a>
                <div class="block lg:hidden">
                    <button id="navbar-toggle" class="text-gray-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex space-x-4" id="navbar-menu">
                    <a class="text-gray-600 hover:text-blue-600" href="{{ route('surveys.index') }}">Daftar Survei</a>


                    <!-- Ganti 1 dengan ID survei yang sesuai -->
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Survey</h1>
        <div>
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#yourTableId').DataTable(); // Ganti #yourTableId dengan ID tabel Anda
        });

        // Navbar toggle untuk mobile
        $('#navbar-toggle').on('click', function() {
            $('#navbar-menu').toggleClass('hidden');
        });
    </script>
</body>

</html>
