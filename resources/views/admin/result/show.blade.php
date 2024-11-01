@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-xl font-bold">{{ $surveyResponses->first()->survey->title }}</h1>
        <div>
            <p><strong>User:</strong> {{ $surveyResponses->first()->user->name }}</p>
            <p><strong>Child Name:</strong> {{ $surveyResponses->first()->child_name }}</p>
        </div>

        <h2 class="mt-4">Questions and Answers</h2>
        <ul>
            @foreach ($surveyResponses as $response)
                <li>
                    <strong>Question:</strong> {{ $response->question->question_text }}<br>
                    <strong>Answer:</strong> {{ $response->answer->answer_text }} (Value: {{ $response->answer->value }})
                </li>
            @endforeach
        </ul>
    </div>
@endsection
