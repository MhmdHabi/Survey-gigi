@extends('layouts.master')

@section('title', 'Kuesioner Menyikat Gigi')

@section('content')
    <section class="mt-16 py-10 pb-7 lg:py-16 px-8 lg:px-16 bg-gray-50 flex justify-center items-center min-h-screen">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-center mb-6">Survey Kebiasaan Menyikat Gigi</h1>

            <form action="#" method="POST">
                @csrf <!-- CSRF token for security -->

                <!-- Pertanyaan 1 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">1. Apakah Anda menyikat gigi dua kali sehari?</p>
                    <div class="flex gap-4 mt-2">
                        <label
                            class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50 space-x-2">
                            <input type="radio" name="q1" value="Iya" required>
                            <span class="mr-2 text-gray-700 font-medium">Iya</span>
                        </label>
                        <label
                            class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50 space-x-2">
                            <input type="radio" name="q1" value="Tidak" required>
                            <span class="mr-2 text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 2 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">2. Apakah Anda menggunakan pasta gigi berfluoride?</p>
                    <div class="flex gap-4 mt-2">
                        <label
                            class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50 space-x-2">
                            <input type="radio" name="q2" value="Iya" required>
                            <span class="mr-2 text-gray-700 font-medium">Iya</span>
                        </label>
                        <label
                            class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50 space-x-2">
                            <input type="radio" name="q2" value="Tidak" required>
                            <span class="mr-2 text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 3 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">3. Apakah Anda mengganti sikat gigi setiap 3 bulan sekali?</p>
                    <div class="flex gap-4 mt-2">
                        <label
                            class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50 space-x-2">
                            <input type="radio" name="q3" value="Iya" required>
                            <span class="mr-2 text-gray-700 font-medium">Iya</span>
                        </label>
                        <label
                            class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50 space-x-2">
                            <input type="radio" name="q3" value="Tidak" required>
                            <span class="mr-2 text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 4 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">4. Apakah Anda membersihkan lidah saat menyikat gigi?</p>
                    <div class="flex gap-4 mt-2">
                        <label
                            class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50 space-x-2">
                            <input type="radio" name="q4" value="Iya" required>
                            <span class="mr-2 text-gray-700 font-medium">Iya</span>
                        </label>
                        <label
                            class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50 space-x-2">
                            <input type="radio" name="q4" value="Tidak" required>
                            <span class="mr-2 text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 5 -->
                <div class="mb-6">
                    <p class="text-lg font-medium">5. Apakah Anda merasa perlu untuk menyikat gigi lebih dari dua kali
                        sehari?</p>
                    <div class="flex gap-4 mt-2">
                        <label
                            class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50 space-x-2">
                            <input type="radio" name="q5" value="Iya" required>
                            <span class="mr-2 text-gray-700 font-medium">Iya</span>
                        </label>
                        <label
                            class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50 space-x-2">
                            <input type="radio" name="q5" value="Tidak" required>
                            <span class="mr-2 text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg font-medium hover:bg-blue-600">
                    Kirim Jawaban
                </button>
            </form>
        </div>
    </section>
@endsection
