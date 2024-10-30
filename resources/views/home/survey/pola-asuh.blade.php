@extends('layouts.master')

@section('title', 'Kuesioner Pola Asuh Orang Tua')

@section('content')
    <section class="mt-16 py-10 pb-7 lg:py-16 px-8 lg:px-16 bg-gray-50 flex justify-center items-center min-h-screen">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-center mb-6">Survey Pola Asuh Orang Tua</h1>

            <form action="#" method="POST">
                @csrf <!-- Add CSRF token for security -->

                <!-- Pertanyaan 1 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">1. Apakah Anda memberikan pujian kepada anak Anda atas perilaku baiknya?
                    </p>
                    <div class="flex gap-4 mt-2">
                        <label
                            class="flex items-center cursor-pointer border rounded-full border-gray-300 p-2 hover:border-blue-500">
                            <input type="radio" name="q1" value="Iya" class="mr-2" required>
                            <span class="text-gray-700 font-medium">Iya</span>
                        </label>
                        <label
                            class="flex items-center cursor-pointer border rounded-full border-gray-300 p-2 hover:border-blue-500">
                            <input type="radio" name="q1" value="Tidak" class="mr-2" required>
                            <span class="text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 2 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">2. Apakah Anda memberikan nasihat kepada anak saat ia berperilaku buruk?
                    </p>
                    <div class="flex gap-4 mt-2">
                        <label
                            class="flex items-center cursor-pointer border rounded-full border-gray-300 p-2 hover:border-blue-500">
                            <input type="radio" name="q2" value="Iya" class="mr-2" required>
                            <span class="text-gray-700 font-medium">Iya</span>
                        </label>
                        <label
                            class="flex items-center cursor-pointer border rounded-full border-gray-300 p-2 hover:border-blue-500">
                            <input type="radio" name="q2" value="Tidak" class="mr-2" required>
                            <span class="text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 3 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">3. Apakah Anda melibatkan anak dalam pengambilan keputusan keluarga?</p>
                    <div class="flex gap-4 mt-2">
                        <label
                            class="flex items-center cursor-pointer border rounded-full border-gray-300 p-2 hover:border-blue-500">
                            <input type="radio" name="q3" value="Iya" class="mr-2" required>
                            <span class="text-gray-700 font-medium">Iya</span>
                        </label>
                        <label
                            class="flex items-center cursor-pointer border rounded-full border-gray-300 p-2 hover:border-blue-500">
                            <input type="radio" name="q3" value="Tidak" class="mr-2" required>
                            <span class="text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 4 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">4. Apakah Anda membuat aturan yang tegas untuk anak Anda?</p>
                    <div class="flex gap-4 mt-2">
                        <label
                            class="flex items-center cursor-pointer border rounded-full border-gray-300 p-2 hover:border-blue-500">
                            <input type="radio" name="q4" value="Iya" class="mr-2" required>
                            <span class="text-gray-700 font-medium">Iya</span>
                        </label>
                        <label
                            class="flex items-center cursor-pointer border rounded-full border-gray-300 p-2 hover:border-blue-500">
                            <input type="radio" name="q4" value="Tidak" class="mr-2" required>
                            <span class="text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 5 -->
                <div class="mb-6">
                    <p class="text-lg font-medium">5. Apakah Anda mengekspresikan kasih sayang kepada anak Anda dengan
                        tindakan?</p>
                    <div class="flex gap-4 mt-2">
                        <label
                            class="flex items-center cursor-pointer border rounded-full border-gray-300 p-2 hover:border-blue-500">
                            <input type="radio" name="q5" value="Iya" class="mr-2" required>
                            <span class="text-gray-700 font-medium">Iya</span>
                        </label>
                        <label
                            class="flex items-center cursor-pointer border rounded-full border-gray-300 p-2 hover:border-blue-500">
                            <input type="radio" name="q5" value="Tidak" class="mr-2" required>
                            <span class="text-gray-700 font-medium">Tidak</span>
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
