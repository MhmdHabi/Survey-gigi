@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Isi Survei: {{ $survey->title }}</h2>

        <h4>Deskripsi: {{ $survey->description }}</h4>
        <form action="{{ route('surveys.response', $survey->id) }}" method="GET">
            @csrf
            <div class="mb-3">
                <label for="child_name" class="form-label">Nama Anak</label>
                <input type="text" class="form-control" name="child_name" required>
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="birth_date" required>
            </div>

            @foreach ($survey->questions as $question)
                <div class="mb-3">
                    <label class="form-label">{{ $question->question_text }}</label>
                    @if ($question->type === 'multiple_choice')
                        @foreach ($question->answers as $answer)
                            <div>
                                <input type="radio" name="responses[{{ $question->id }}]" value="{{ $answer->id }}"
                                    required>
                                {{ $answer->answer_text }}
                            </div>
                        @endforeach
                    @else
                        <input type="text" class="form-control" name="responses[{{ $question->id }}]"
                            placeholder="Tulis jawaban">
                    @endif
                </div>
            @endforeach

            <button type="submit" class="btn btn-success">Kirim Respons</button>
        </form>
    </div>
@endsection
