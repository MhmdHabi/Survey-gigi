@extends('layouts.dashboard')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Users List</h1>

        @if ($users->isEmpty())
            <p>No users found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-3 px-4 border border-gray-300 font-medium text-md text-left">Name</th>
                            <th class="py-3 px-4 border border-gray-300 font-medium text-md text-left">Email</th>
                            <th class="py-3 px-4 border border-gray-300 font-medium text-md text-center">Age</th>
                            <th class="py-3 px-4 border border-gray-300 font-medium text-md text-left">Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-100 transition duration-300">
                                <td class="py-2 px-4 border border-gray-300">{{ $user->name }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $user->email }}</td>
                                <td class="py-2 px-4 border border-gray-300 text-center">{{ $user->age }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $user->gender }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
