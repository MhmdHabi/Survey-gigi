@extends('layouts.master')
@section('title', 'Detail Hasil Survei')

@section('content')
    <div class="mt-12 py-10 px-6 sm:px-12 md:px-16 lg:px-24 min-h-screen">
        <!-- Back Button -->
        <a href="{{ route('survey.results') }}" class="flex items-center text-blue-400 mb-6 md:mb-8">
            <i class="fas fa-arrow-left mr-2"></i>
            <span class="text-lg font-semibold">Kembali</span>
        </a>

        <!-- Survey Title -->
        <h2 class="text-2xl md:text-4xl font-semibold mb-3 text-center text-black font-sans">Detail Hasil Survei
        </h2>

        <h3 class="text-2xl md:text-3xl text-center capitalize font-semibold text-black mb-4 lg:mb-10">
            {{ $surveyResults->first()->survey->title }}</h3>

        <!-- Check if there are any survey results -->
        @if ($surveyResults->isEmpty())
            <p class="text-center text-xl text-gray-500 font-light">Tidak ada hasil survei yang ditemukan.</p>
        @else
            <!-- Survey Information Section -->
            <div class="bg-white rounded-xl shadow-md p-6 md:p-10 mb-10">

                <!-- User Information Section -->
                <div class="flex flex-col md:flex-row items-start md:items-start justify-between">
                    <div class="md:w-2/3 mb-4 md:mb-0">
                        <div class="flex flex-col md:flex-row items-start mb-2">
                            <p class="text-lg text-gray-800 font-medium w-full md:w-40"><strong>Nama Orang Tua :</strong>
                            </p>
                            <p class="text-lg text-gray-800 md:ml-4">{{ optional($surveyResponse->user)->name ?? 'N/A' }}
                            </p>
                        </div>
                        <div class="flex flex-col md:flex-row items-start mb-2">
                            <p class="text-lg text-gray-800 font-medium w-full md:w-40"><strong>Nama Anak :</strong></p>
                            <p class="text-lg text-gray-800 md:ml-4">{{ $surveyResponse->child_name }}</p>
                        </div>
                        <div class="flex flex-col md:flex-row items-start mb-2">
                            <p class="text-lg text-gray-800 font-medium w-full md:w-40"><strong>Umur Anak :</strong></p>
                            <p class="text-lg text-gray-800 md:ml-4">
                                @php
                                    $birthDate = \Carbon\Carbon::parse($surveyResponse->birth_date);
                                    $ageYears = $birthDate->diffInYears(now());
                                    $ageMonths = $birthDate->copy()->addYears($ageYears)->diffInMonths(now());
                                @endphp
                                {{ $ageYears }} tahun {{ $ageMonths }} bulan
                            </p>
                        </div>
                        <div class="flex flex-col md:flex-row items-start">
                            <p class="text-lg text-gray-800 font-medium w-full md:w-40"><strong>Skor :</strong></p>
                            <p class="text-lg text-gray-800 md:ml-4">{{ $surveyResponse->hasil }}%</p>
                        </div>
                    </div>

                    <!-- Display Survey Image -->
                    <div class="md:w-1/3 flex flex-col items-center mt-6 md:mt-0">
                        @if ($surveyResponse->image)
                            <img src="{{ asset('storage/' . $surveyResponse->image->path) }}" alt="Image"
                                class="w-32 h-32 md:w-40 md:h-40 object-cover mb-2 rounded-md">
                            <p class="text-sm text-gray-600 text-center">Keterangan :
                                {{ $surveyResponse->image->keterangan }}</p>
                        @else
                            <p class="text-sm text-gray-600 text-center">Tidak ada gambar yang diunggah.</p>
                        @endif
                    </div>
                </div>

            </div>

            <!-- Questions and Answers Section -->
            <h3 class="text-2xl md:text-3xl font-semibold text-center text-black mb-6 md:mb-8">Pertanyaan dan Jawaban
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach ($surveyResults as $response)
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <p class="text-lg text-black font-medium mb-2">
                            <span>{{ $loop->iteration }}.</span> {{ $response->question->question_text }}
                        </p>
                        <p class="text-md text-gray-700 mt-3 pl-5">
                            <strong>Jawaban:</strong> {{ $response->answer->answer_text }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
