@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Pertanyaan untuk Survei: {{ $survey->title }}</h2>
        <a href="{{ route('questions.create', $survey->id) }}" class="btn btn-success mb-4">Tambah Pertanyaan</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pertanyaan</th>
                    <th>Tipe</th>
                    <th>Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($survey->questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->question_text }}</td>
                        <td>{{ $question->type }}</td>
                        <td>
                            @foreach ($question->answers as $answer)
                                <div>{{ $answer->answer_text }}</div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
