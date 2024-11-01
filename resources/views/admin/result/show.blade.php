@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto">
        <!-- Display the Survey Title -->
        <h1 class="text-xl font-bold">{{ $surveyResponses->first()->survey->title }}</h1>

        <!-- User and Survey Response Details -->
        <div class="mt-4">
            <p><strong>User:</strong> {{ $surveyResponses->first()->user->name }}</p>

            <!-- Access child_name from the survey_response relationship -->
            <p><strong>Child Name:</strong> {{ $surveyResponses->first()->survey_response->child_name }}</p>
            <p><strong>Birth Date:</strong> {{ $surveyResponses->first()->survey_response->birth_date }}</p>
            <p><strong>Gender:</strong> {{ $surveyResponses->first()->survey_response->gender }}</p>
        </div>

        <!-- Questions and Answers -->
        <h2 class="mt-4">Questions and Answers</h2>
        <ul class="list-disc pl-5 mt-2">
            @foreach ($surveyResponses as $response)
                <li class="mb-4">
                    <strong>Question:</strong> {{ $response->question->question_text }}<br>
                    <strong>Answer:</strong> {{ $response->answer->answer_text }} (Value: {{ $response->answer->value }})
                </li>
            @endforeach
        </ul>
    </div>
@endsection
