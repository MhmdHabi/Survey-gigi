@extends('layouts.dashboard')

@section('title', 'Detail Survei')

@section('content')
    <div class="container mx-auto mt-6 bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-4 text-blue-600">Detail Survei: {{ $survey->title }}</h2>
        <p class="mb-4 text-gray-700">{{ $survey->description }}</p>

        <!-- Display the image if it exists -->
        @if ($survey->image)
            <!-- Adjust the property if needed -->
            <div class="mb-4">
                <img src="{{ asset('storage/' . $survey->image) }}" alt="Gambar Bukti"
                    class="w-full h-auto rounded-lg shadow-md">
            </div>
        @endif

        <a href="{{ route('questions.buat', $survey->id) }}"
            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block transition duration-200">Tambah
            Pertanyaan</a>

        <h4 class="text-xl font-semibold mb-3 text-gray-800">Pertanyaan</h4>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-blue-100 text-gray-700">
                    <th class="py-2 px-4 border-b">Kategori</th>
                    <th class="py-2 px-4 border-b">Pertanyaan</th>
                    <th class="py-2 px-4 border-b">Jawaban</th>
                    <th class="py-2 px-4 border-b">Response Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($survey->questions as $question)
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-4 border-b text-gray-600">
                            {{ $question->category ? $question->category->name : 'Tidak ada kategori' }}
                        </td>
                        <td class="py-2 px-4 border-b text-gray-800">{{ $question->question_text }}</td>
                        <td class="py-2 px-4 border-b">
                            @if ($question->type === 'multiple_choice')
                                <ul class="list-disc pl-5">
                                    @foreach ($question->answers as $answer)
                                        <li class="text-gray-700">
                                            {{ $answer->answer_text }}
                                            <span class="text-sm text-gray-500">({{ $answer->response_count }})</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="italic text-gray-500">Tidak ada pilihan jawaban.</p>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b text-gray-800">
                            @if ($question->type === 'multiple_choice')
                                @php
                                    // Calculate the score based on responses
                                    $totalResponses = $question->answers->sum('response_count');
                                    $points = $question->answers->sum(function ($answer) {
                                        return $answer->response_count * ($answer->answer_text === 'Selalu' ? 1 : 0);
                                    });
                                    $score = $totalResponses ? ($points / $totalResponses) * 100 : 0;
                                @endphp
                                {{ round($score, 2) }} %
                            @else
                                <p class="italic text-gray-500">Tidak ada respon.</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('surveys.index') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block transition duration-200">Kembali</a>
    </div>

@endsection
