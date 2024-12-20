@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <a href="{{ route('survey.response.result') }}" class="inline-block mb-4 py-2">
            <i class="fas fa-arrow-left mr-3"></i>Kembali
        </a>

        <!-- Display the Survey Title -->
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">{{ $surveyResponses->first()->survey->title }}</h1>

        <!-- User and Survey Response Details -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8 flex justify-between">
            <div class="w-2/3"> <!-- Set width to 2/3 of the parent -->
                <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Detail Responden</h2>
                <div class="flex mb-2">
                    <span class="font-medium text-gray-800 w-1/3">Nama Orang Tua:</span>
                    <span class="text-gray-600 w-2/3">{{ $surveyResponses->first()->user->name }}</span>
                </div>
                <div class="flex mb-2">
                    <span class="font-medium text-gray-800 w-1/3">Nama Anak:</span>
                    <span class="text-gray-600 w-2/3">{{ $surveyResponses->first()->survey_response->child_name }}</span>
                </div>
                <div class="flex mb-2">
                    <span class="font-medium text-gray-800 w-1/3">Tanggal Lahir:</span>
                    <span class="text-gray-600 w-2/3">
                        {{ \Carbon\Carbon::parse($surveyResponses->first()->survey_response->birth_date)->isoFormat('dddd, D MMMM YYYY') }}
                    </span>
                </div>
                <div class="flex mb-2">
                    <span class="font-medium text-gray-800 w-1/3">Umur:</span>
                    <span class="text-gray-600 w-2/3">
                        @php
                            $birthDate = \Carbon\Carbon::parse($surveyResponses->first()->survey_response->birth_date);
                            $age = $birthDate->diff(now());
                        @endphp
                        {{ $age->y }} tahun {{ $age->m }} bulan
                    </span>
                </div>
                <div class="flex mb-2">
                    <span class="font-medium text-gray-800 w-1/3">Jenis Kelamin:</span>
                    <span class="text-gray-600 w-2/3">{{ $surveyResponses->first()->survey_response->gender }}</span>
                </div>
            </div>
            <!-- Image Details -->
            <div class="flex flex-col mb-2 justify-center items-center w-1/3"> <!-- Set width to 1/3 of the parent -->
                <span class="font-medium text-gray-800 w-full">Gambar Survey:</span>
                <span class="text-gray-600 w-full text-center">
                    @if ($surveyResponses->first()->survey_response->image)
                        <img src="{{ asset('storage/' . $surveyResponses->first()->survey_response->image->path) }}"
                            alt="{{ $surveyResponses->first()->survey_response->image->keterangan }}"
                            class="w-64 h-64 object-cover">
                        <div class="flex text-center space-x-4">
                            <p>Keterangan : </p>
                            <p class="text-gray-600">
                                {{ $surveyResponses->first()->survey_response->image->keterangan }}
                            </p>
                        </div>
                        <div class="flex text-center space-x-4">
                            <p class="text-xl">Nilai : </p>
                            <p class="text-xl">
                                {{ $surveyResponses->first()->survey_response->image->nilai_image }}
                            </p>
                        </div>
                    @else
                        <p>Tidak ada gambar.</p>
                    @endif
                </span>
            </div>
        </div>


        <!-- Questions and Answers -->
        <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Pertanyaan dan Jawaban</h2>
        <ul class="bg-white shadow-lg rounded-lg p-4 space-y-4">
            @foreach ($surveyResponses as $index => $response)
                <li class="border-b last:border-b-0 py-4 flex items-start">
                    <span class="text-lg text-black mr-3" style="font-size: 1.2rem;">{{ $index + 1 }}.</span>
                    <div class="flex flex-col w-full">
                        <p class="text-gray-600">{{ $response->question->question_text }}</p>
                        <strong class="text-gray-800 mt-1">Jawaban:</strong>
                        <p class="text-gray-600">{{ $response->answer->answer_text }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
