@extends('layouts.dashboard')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Users List</h1>

        @if ($users->isEmpty())
            <p>No users found.</p>
        @else
            <div class="overflow-x-auto">
                <table id="users-table" class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-3 px-4 border border-gray-300 font-medium text-md text-left">Nama Orang Tua</th>
                            <th class="py-3 px-4 border border-gray-300 font-medium text-md text-left">Email</th>
                            <th class="py-3 px-4 border border-gray-300 font-medium text-md text-center">Umur</th>
                            <th class="py-3 px-4 border border-gray-300 font-medium text-md text-left">Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-100 transition duration-300">
                                <td class="py-2 px-4 border font-medium text-md border-gray-300">{{ $user->name }}</td>
                                <td class="py-2 px-4 border font-medium text-md border-gray-300">{{ $user->email }}</td>
                                <td class="py-2 px-4 border font-medium text-md border-gray-300 text-center">
                                    {{ $user->age }}
                                </td>
                                <td class="py-2 px-4 border font-medium text-md border-gray-300">{{ $user->gender }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- CDN jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Custom CSS to add space between search input and table -->
    <style>
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1rem;
        }
    </style>

    <!-- DataTables Initialization Script -->
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
