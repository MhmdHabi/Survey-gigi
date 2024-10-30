@extends('layouts.master')

@section('title', 'Register')

@section('content')
    <div class="container mx-auto py-10">
        <h2 class="text-2xl font-bold text-center mb-8">Register</h2>

        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
            <form action="" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="parent_name" class="block text-sm font-semibold text-gray-700">Nama Orangtua</label>
                    <input type="text" id="parent_name" name="parent_name" required
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="child_name" class="block text-sm font-semibold text-gray-700">Nama Anak</label>
                    <input type="text" id="child_name" name="child_name" required
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="age" class="block text-sm font-semibold text-gray-700">Umur</label>
                    <input type="number" id="age" name="age" required
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700">Jenis Kelamin</label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="male" class="form-radio text-blue-600" required>
                            <span class="ml-2">Laki-laki</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" name="gender" value="female" class="form-radio text-blue-600" required>
                            <span class="ml-2">Perempuan</span>
                        </label>
                    </div>
                </div>

                <div class="mb-6">
                    <button type="submit"
                        class="w-full bg-[#5DB9FF] text-white font-semibold py-2 rounded-lg hover:bg-blue-500 transition duration-300">Daftar</button>
                </div>
            </form>
        </div>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Sudah punya akun? <a href="{{ route('login') }}"
                    class="text-blue-600 hover:underline">Login</a></p>
        </div>
    </div>
@endsection
