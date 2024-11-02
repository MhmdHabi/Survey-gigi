@extends('layouts.master')
@section('title', 'Detail Hasil Survei')

@section('content')
    <div class="mt-16 py-16 px-8 md:px-20 bg-blue-50 min-h-screen">
        <!-- Back Button -->
        <a href="{{ route('survey.results') }}" class="flex items-center text-blue-500 hover:text-blue-700 mb-8">
            <i class="fas fa-arrow-left mr-2"></i>
            <span class="text-lg font-semibold">Kembali</span>
        </a>

        <!-- Survey Title -->
        <h2 class="text-4xl font-semibold mb-10 text-center text-blue-500 font-sans">Detail Hasil Survei</h2>

        <!-- Check if there are any survey results -->
        @if ($surveyResults->isEmpty())
            <p class="text-center text-xl text-gray-500 font-light">Tidak ada hasil survei yang ditemukan.</p>
        @else
            <!-- Survey Information Section -->
            <div class="bg-white rounded-xl shadow-md p-10 mb-12">
                <h3 class="text-3xl font-semibold text-blue-500 mb-4">{{ $surveyResults->first()->survey->title }}</h3>
                <p class="text-gray-700 font-light mb-6">{{ $surveyResults->first()->survey->description }}</p>

                <!-- User Information Section -->
                <div class="border-t border-purple-200 pt-6">
                    <p class="text-lg text-gray-800 mb-1"><strong>Nama Orang tua:</strong>
                        {{ optional($surveyResponse->user)->name ?? 'N/A' }}</p>
                    <p class="text-lg text-gray-800 mb-1"><strong>Nama Anak:</strong> {{ $surveyResponse->child_name }}</p>
                    <p class="text-lg text-gray-800 mb-1"><strong>Umur Anak:</strong> @php
                        $birthDate = \Carbon\Carbon::parse($surveyResponse->birth_date);
                        $ageYears = $birthDate->diffInYears(now());
                        $ageMonths = $birthDate->copy()->addYears($ageYears)->diffInMonths(now());
                    @endphp
                        {{ $ageYears }} tahun {{ $ageMonths }} bulan</p>
                    <p class="text-lg text-gray-800"><strong>Skor:</strong> {{ $surveyResponse->hasil }}%</p>
                </div>
            </div>

            <!-- Questions and Answers Section -->
            <h3 class="text-2xl font-semibold text-center text-blue-500 mb-8">Pertanyaan dan Jawaban</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($surveyResults as $response)
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <p class="text-lg text-blue-500 font-semibold"><strong>Pertanyaan:</strong>
                            {{ $response->question->question_text }}</p>
                        <p class="text-md text-gray-700 mt-3"><strong>Jawaban:</strong> {{ $response->answer->answer_text }}
                        </p>
                        <p class="text-sm text-gray-500 mt-2">Nilai: <span
                                class="font-medium text-indigo-600">{{ $response->answer->value }}</span></p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
