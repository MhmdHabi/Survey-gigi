@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <section class="bg-gray-50 px-8 py-20 mt-10">
        <div class="container mx-auto flex justify-center">
            <div class="w-full max-w-sm">
                <form method="POST" action="{{ route('login.submit') }}" class="bg-white shadow-md rounded px-8 py-6">
                    @csrf <!-- CSRF token for security -->

                    <h2 class="text-2xl font-bold text-center mb-6 text-[#5DB9FF]">Masuk</h2>

                    @if ($errors->any())
                        <div class="mb-4 text-red-500 text-sm">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">
                            Email
                        </label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email anda"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('email') }}" required />
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">
                            Kata Sandi
                        </label>
                        <input type="password" id="password" name="password" placeholder="Masukkan kata sandi anda"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            required />
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-[#5DB9FF] hover:bg-[#3a8bbf] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Masuk
                        </button>
                    </div>
                </form>

                <p class="text-center mt-4 text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-[#5DB9FF] hover:underline">
                        Daftar
                    </a>
                </p>
            </div>
        </div>
    </section>
@endsection
