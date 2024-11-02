@extends('layouts.master')

@section('title', 'Hasil Survei')

@section('content')
    <div class="mt-16 py-16 px-8 md:px-16 bg-gray-50">
        <h2 class="text-2xl font-bold mb-6 text-center">Hasil Survei</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @if ($surveyResponses->isEmpty())
            <p class="text-center">Tidak ada hasil survei yang ditemukan.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($surveyResponses as $response)
                    <div
                        class="bg-white shadow-md rounded-lg p-6 flex flex-col relative transition-transform transform hover:scale-105 hover:shadow-lg">
                        <h3 class="text-lg font-semibold text-center mb-4 text-black">{{ $response->title }}</h3>

                        <div class="flex flex-col items-center justify-center mb-4">
                            <div class="w-full bg-gray-200 rounded-full h-6 mb-2">
                                <div class="bg-blue-400 h-6 rounded-full" style="width: {{ $response->hasil }}%;"></div>
                            </div>
                            <span class="text-xl font-bold text-blue-400">{{ $response->hasil }}%</span>
                        </div>

                        <div class="flex flex-col mb-4">
                            <div class="flex justify-between mb-2">
                                <span><strong>Nama Orang Tua:</strong></span>
                                <span>{{ $response->parent_name }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span><strong>Nama Anak:</strong></span>
                                <span>{{ $response->child_name }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span><strong>Tgl Lahir:</strong></span>
                                <span>{{ \Carbon\Carbon::parse($response->birth_date)->locale('id')->translatedFormat('l, d F Y') }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span><strong>Umur Anak:</strong></span>
                                <span>
                                    @php
                                        $birthDate = \Carbon\Carbon::parse($response->birth_date);
                                        $ageYears = $birthDate->diffInYears(now());
                                        $ageMonths = $birthDate->copy()->addYears($ageYears)->diffInMonths(now());
                                    @endphp
                                    {{ $ageYears }} tahun {{ $ageMonths }} bulan
                                </span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span><strong>Jenis Kelamin:</strong></span>
                                <span>{{ $response->gender }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span><strong>Tgl Survey:</strong></span>
                                <span>{{ \Carbon\Carbon::parse($response->created_at)->locale('id')->translatedFormat('l, d F Y') }}</span>
                            </div>
                        </div>

                        {{-- Display Evaluation Message and Image --}}
                        <div class="flex flex-col items-center mb-4">
                            @if ($response->hasil >= 76)
                                <p class="text-green-500 font-semibold">Evaluasi: Baik</p>
                                <img src="{{ asset('path/to/good_image.jpg') }}" alt="Baik"
                                    class="h-16 w-16 object-cover mb-2">
                            @elseif ($response->hasil >= 56)
                                <p class="text-yellow-500 font-semibold">Evaluasi: Sedang</p>
                                <img src="{{ asset('path/to/average_image.jpg') }}" alt="Sedang"
                                    class="h-16 w-16 object-cover mb-2">
                            @else
                                <p class="text-red-500 font-semibold">Evaluasi: Buruk</p>
                                <img src="{{ asset('path/to/bad_image.jpg') }}" alt="Buruk"
                                    class="h-16 w-16 object-cover mb-2">
                            @endif
                        </div>

                        <a href="{{ route('survey.results.show', $response->id) }}"
                            class="bg-blue-400 text-white py-2 px-4 rounded-full text-center hover:bg-blue-700 transition duration-300">
                            Detail Survey
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
