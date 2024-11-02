@extends('layouts.master')

@section('title', 'Kuesioner Susu Formula')

@section('content')
    <section class="mt-16 py-10 pb-7 lg:py-16 px-8 lg:px-16 bg-gray-50 flex justify-center items-center min-h-screen">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-center mb-6">{{ $survey->title }}</h1>

            <!-- Instructions -->
            <div class="mb-8 p-6 border-l-4 border-blue-500 bg-blue-50 rounded-lg text-gray-700 shadow-md">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-500 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 22a1 1 0 0 1-1-1v-1.28a8.46 8.46 0 0 1-3.71-1.44.92.92 0 0 1-.29-1.28l1.42-1.42a.92.92 0 0 1 1.28-.29A5.73 5.73 0 0 0 11 17.92V7a1 1 0 0 1 2 0v10.92a5.73 5.73 0 0 0 1.3.64.92.92 0 0 1 .29 1.28l-1.42 1.42a.92.92 0 0 1-1.28.29 8.47 8.47 0 0 1-3.71 1.44V21a1 1 0 0 1-1 1z">
                        </path>
                    </svg>
                    <div>
                        <p class="text-lg font-semibold mb-2">Petunjuk Pengisian Kuesioner</p>
                        <p class="mb-2">Sebelum mengisi kuesioner, silakan lengkapi terlebih dahulu informasi kebutuhan
                            anak di form berikut.</p>
                        <p>Setelah itu, lanjutkan dengan menjawab setiap pertanyaan berdasarkan pengalaman Orang Tua</p>
                    </div>
                </div>
            </div>


            <form action="{{ route('surveys.submit', $survey->id) }}" method="POST">
                @csrf

                <!-- Child Info Section -->
                <div class="mb-8">
                    <div class="mb-4">
                        <label for="child_name" class="block text-gray-700">Nama Anak</label>
                        <input type="text" id="child_name" name="child_name" placeholder="Nama Anak" required
                            class="w-full p-2 border rounded">
                    </div>

                    <div class="mb-4">
                        <label for="birth_date" class="block text-gray-700">Tanggal Lahir</label>
                        <input type="date" id="birth_date" name="birth_date" required class="w-full p-2 border rounded">
                    </div>

                    <div class="mb-4">
                        <label for="gender" class="block text-gray-700">Jenis Kelamin</label>
                        <select id="gender" name="gender" required class="w-full p-2 border rounded">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- Survey Questions Section -->
                <div class="border-t border-gray-300 pt-8">
                    @foreach ($questions as $category_id => $category_questions)
                        @php
                            $category_name = $category_questions->first()->category->name ?? null;
                        @endphp

                        <!-- Show category title only if it exists -->
                        @if ($category_name)
                            <div class="mb-8 p-4 bg-gray-100 rounded-lg shadow-inner">
                                <h2 class="text-lg font-bold text-gray-800 mb-4">
                                    Kategori: {{ $category_name }}
                                </h2>
                            @else
                                <div class="mb-8 p-4 bg-gray-100 rounded-lg shadow-inner">
                        @endif

                        @foreach ($category_questions as $question)
                            <div class="mb-4">
                                <p class="font-semibold mb-2">{{ $question->question_text }}</p>
                                <div class="flex flex-col space-y-2">
                                    @foreach ($question->answers as $answer)
                                        <label class="flex items-center">
                                            <input type="radio" name="answers[{{ $question->id }}]"
                                                value="{{ $answer->id }}" class="mr-2">
                                            {{ $answer->answer_text }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                </div> <!-- End of category section -->
                @endforeach
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white rounded py-2 mt-6">Kirim Jawaban</button>
        </form>
        </div>
    </section>
@endsection
