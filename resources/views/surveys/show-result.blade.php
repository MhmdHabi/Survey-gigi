@extends('layouts.master')
@section('title', 'Detail Hasil Survei')

@section('content')
    <div class="mt-16 py-16 px-8 md:px-16 bg-gray-50">
        <h2 class="text-2xl font-bold mb-6 text-center">Detail Hasil Survei</h2>

        <!-- Check if there are any survey results -->
        @if ($surveyResults->isEmpty())
            <p>No survey results found.</p>
        @else
            <!-- Display Survey Information -->
            <h2 class="text-xl font-semibold">{{ $surveyResults->first()->survey->title }}</h2>
            <p class="text-gray-600">{{ $surveyResults->first()->survey->description }}</p>

            <div class="mt-4">
                <p><strong>User:</strong> {{ optional($surveyResponse->user)->name ?? 'N/A' }}</p>
                <p><strong>Child Name:</strong> {{ $surveyResponse->child_name }}</p>
                <p><strong>Result:</strong> {{ $surveyResponse->hasil }}%</p>
            </div>

            <h3 class="mt-6 text-lg font-medium">Questions and Answers</h3>
            <ul class="mt-2 space-y-4">
                @foreach ($surveyResults as $response)
                    <li class="p-4 border rounded-md bg-gray-50">
                        <strong>Question:</strong> {{ $response->question->question_text }}<br>
                        <strong>Answer:</strong> {{ $response->answer->answer_text }}
                        <span class="text-sm text-gray-500">(Value: {{ $response->answer->value }})</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
