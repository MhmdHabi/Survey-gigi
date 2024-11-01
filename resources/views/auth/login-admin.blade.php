@extends('layouts.master')

@section('title', 'Login Admin')

@section('content')
    <div class="bg-gray-50 flex items-center justify-center h-screen">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-sm w-full">
            <h2 class="text-2xl font-bold text-center text-[#5DB9FF] mb-6">Admin Login</h2>

            @if ($errors->any())
                <div class="mb-4">
                    <ul class="text-red-500">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold">Email</label>
                    <input type="email" name="email" id="email" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 px-4 py-2">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 px-4 py-2">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
