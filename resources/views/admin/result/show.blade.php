@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto">
        <!-- Display the Survey Title -->
        <h1 class="text-xl font-bold">{{ $surveyResponses->first()->survey->title }}</h1>

        <!-- User and Survey Response Details -->
        <div class="mt-4">
            <p><strong>Nama Orang Tua:</strong> {{ $surveyResponses->first()->user->name }}</p>

            <!-- Access child_name from the survey_response relationship -->
            <p><strong>Nama Anak:</strong> {{ $surveyResponses->first()->survey_response->child_name }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $surveyResponses->first()->survey_response->birth_date }}</p>
            <p><strong>Umur:</strong>
                {{ \Carbon\Carbon::parse($surveyResponses->first()->survey_response->birth_date)->diffInYears(now()) }}
                tahun</p>
            <p><strong>Jenis Kelamin:</strong> {{ $surveyResponses->first()->survey_response->gender }}</p>

        </div>

        <!-- Questions and Answers -->
        <h2 class="mt-4">Pertanyaan dan Jawaban</h2>
        <ul class="list-disc pl-5 mt-2">
            @foreach ($surveyResponses as $response)
                <li class="mb-4">
                    <strong>Pertanyaan:</strong> {{ $response->question->question_text }}<br>
                    <strong>Jawaban:</strong> {{ $response->answer->answer_text }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
