@extends('layouts.master')

@section('title', 'Kuesioner Susu Formula')

@section('content')
    <section class="mt-16 py-10 pb-7 lg:py-16 px-8 lg:px-16 bg-gray-50 flex justify-center items-center min-h-screen">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-center mb-6">{{ $survey->title }}</h1>

            <form action="{{ route('surveys.submit', $survey->id) }}" method="POST">
                @csrf

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

                <!-- Loop for displaying questions and answers -->
                @foreach ($questions as $question)
                    <div class="mb-4">
                        <p class="font-semibold">{{ $question->question_text }}</p>
                        @foreach ($question->answers as $answer)
                            <label class="block">
                                <input type="checkbox" name="answers[]" value="{{ $answer->id }}" class="mr-2">
                                {{ $answer->answer_text }}
                            </label>
                        @endforeach
                    </div>
                @endforeach

                <button type="submit" class="w-full bg-blue-500 text-white rounded py-2">Kirim Jawaban</button>
            </form>

        </div>
    </section>
@endsection
