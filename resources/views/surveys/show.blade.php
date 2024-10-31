@extends('layouts.app')

@section('title', 'Detail Survei')

@section('content')
    <div class="container mx-auto mt-6">
        <h2 class="text-2xl font-bold mb-4">Detail Survei: {{ $survey->title }}</h2>
        <p class="mb-4">{{ $survey->description }}</p>
        <a href="{{ route('questions.create', $survey->id) }}"
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Tambah
            Pertanyaan</a>

        <h4 class="text-lg font-semibold mb-2">Pertanyaan</h4>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border-b">Pertanyaan</th>
                    <th class="py-2 px-4 border-b">Jawaban</th>
                    <th class="py-2 px-4 border-b">Response Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($survey->questions as $question)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $question->question_text }}</td>
                        <td class="py-2 px-4 border-b">
                            @if ($question->type === 'multiple_choice')
                                <ul class="list-disc pl-5">
                                    @foreach ($question->answers as $answer)
                                        <li>
                                            {{ $answer->answer_text }}
                                            ({{ $answer->response_count }})
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="italic">Tidak ada pilihan jawaban.</p>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">
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
                                <p class="text-sm text-gray-500">
                                    Ket: J = Jumlah point soal, T = Total soal. Rumus: J/T x 100 = skor %
                                </p>
                            @else
                                <p class="italic">Tidak ada respon.</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('surveys.index') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4 inline-block">Kembali</a>
    </div>
@endsection
