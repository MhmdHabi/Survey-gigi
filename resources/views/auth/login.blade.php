@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <section class="bg-gray-50 py-20 mt-10">
        <div class="container mx-auto flex justify-center">
            <div class="w-full max-w-sm">
                <form class="bg-white shadow-md rounded px-8 py-6">
                    <h2 class="text-2xl font-bold text-center mb-6 text-[#5DB9FF]">Login</h2>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="username">
                            Username
                        </label>
                        <input type="text" id="username" name="username" placeholder="Enter your username"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required />
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">
                            Password
                        </label>
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            required />
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-[#5DB9FF] hover:bg-[#3a8bbf] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Login
                        </button>
                    </div>
                </form>

                <p class="text-center mt-4 text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-[#5DB9FF] hover:underline">
                        Register here
                    </a>
                </p>
            </div>
        </div>
    </section>
@endsection
