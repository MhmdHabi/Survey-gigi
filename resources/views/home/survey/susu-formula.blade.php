@extends('layouts.master')

@section('title', 'Kuesioner Susu Formula')

@section('content')
    <section class="mt-16 py-10 pb-7 lg:py-16 px-8 lg:px-16 bg-gray-50 flex justify-center items-center min-h-screen">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-center mb-6">Survey Pemberian Susu Formula</h1>

            <form action="#" method="POST">
                <!-- Pertanyaan 1 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">1. Apakah Anda saat ini memberikan susu formula kepada anak Anda?</p>
                    <div class="flex gap-4 mt-2">
                        <label class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50">
                            <input type="radio" id="q1-yes" name="q1" value="Iya" class="mr-2">
                            <span class="text-gray-700 font-medium">Iya</span>
                        </label>
                        <label class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50">
                            <input type="radio" id="q1-no" name="q1" value="Tidak" class="mr-2">
                            <span class="text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 2 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">2. Apakah Anda pernah berkonsultasi dengan dokter sebelum memilih susu
                        formula?</p>
                    <div class="flex gap-4 mt-2">
                        <label class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50">
                            <input type="radio" id="q2-yes" name="q2" value="Iya" class="mr-2">
                            <span class="text-gray-700 font-medium">Iya</span>
                        </label>
                        <label class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50">
                            <input type="radio" id="q2-no" name="q2" value="Tidak" class="mr-2">
                            <span class="text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 3 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">3. Apakah Anda membaca komposisi nutrisi pada kemasan susu formula?</p>
                    <div class="flex gap-4 mt-2">
                        <label class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50">
                            <input type="radio" id="q3-yes" name="q3" value="Iya" class="mr-2">
                            <span class="text-gray-700 font-medium">Iya</span>
                        </label>
                        <label class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50">
                            <input type="radio" id="q3-no" name="q3" value="Tidak" class="mr-2">
                            <span class="text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 4 -->
                <div class="mb-4">
                    <p class="text-lg font-medium">4. Apakah Anda mempertimbangkan usia anak saat memilih susu formula?</p>
                    <div class="flex gap-4 mt-2">
                        <label class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50">
                            <input type="radio" id="q4-yes" name="q4" value="Iya" class="mr-2">
                            <span class="text-gray-700 font-medium">Iya</span>
                        </label>
                        <label class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50">
                            <input type="radio" id="q4-no" name="q4" value="Tidak" class="mr-2">
                            <span class="text-gray-700 font-medium">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Pertanyaan 5 -->
                <div class="mb-6">
                    <p class="text-lg font-medium">5. Apakah anak Anda memiliki alergi terhadap bahan tertentu dalam susu
                        formula?</p>
                    <div class="flex gap-4 mt-2">
                        <label class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50">
                            <input type="radio" id="q5-yes" name="q5" value="Iya" class="mr-2">
                            <span class="text-gray-700 font-medium">Iya</span>
                        </label>
                        <label class="flex items-center border rounded-full px-4 py-2 cursor-pointer hover:bg-blue-50">
                            <input type="radio" id="q5-no" name="q5" value="Tidak" class="mr-2">
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
