@extends('layouts.master')

@section('title', 'Hasil Survei')

@section('content')
    <div class="mt-16 py-16 px-4 md:px-8 bg-gray-50">
        <h2 class="text-2xl font-bold mb-3">Hasil Survei</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <!-- Back Button -->
        <a href="{{ route('home') }}" class="flex items-center text-blue-500 hover:text-blue-700 mb-8">
            <i class="fas fa-arrow-left mr-2"></i>
            <span class="text-lg font-semibold">Kembali</span>
        </a>

        @if (!$surveyResponse)
            <p>Tidak ada hasil survei yang ditemukan.</p>
        @else
            <div
                class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg md:p-10 justify-center items-center space-x-5">
                <div class="md:w-1/2 md:mr-4 mb-4 md:mb-0">
                    <h3 class="text-lg font-semibold text-center mb-3">{{ $surveyResponse->title }}</h3>
                    <canvas id="chart" width="250" height="250" class="mb-4 mx-auto max-w-xs"></canvas>

                    <div class="flex justify-center mb-2">
                        <span class="mr-2">
                            <span
                                style="display:inline-block; width: 12px; height: 12px; background-color: rgba(75, 192, 192, 0.6);"></span>
                            Performa
                        </span>
                        <span class="ml-4">
                            <span
                                style="display:inline-block; width: 12px; height: 12px; background-color: rgba(255, 255, 255, 1);"></span>
                            Sisa
                        </span>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="w-full md:w-full md:px-0">
                        <div class="flex flex-col px-4 lg:px-20 mb-4">
                            <div class="flex justify-between w-full mb-2">
                                <span class="font-medium"><strong>Nama Orang Tua:</strong></span>
                                <span>{{ $surveyResponse->parent_name }}</span>
                            </div>
                            <div class="flex justify-between w-full mb-2">
                                <span class="font-medium"><strong>Nama Anak:</strong></span>
                                <span>{{ $surveyResponse->child_name }}</span>
                            </div>
                            <div class="flex justify-between w-full mb-2">
                                <span class="font-medium"><strong>Tgl Lahir:</strong></span>
                                <span>{{ \Carbon\Carbon::parse($surveyResponse->birth_date)->locale('id')->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex justify-between w-full mb-2">
                                <span class="font-medium"><strong>Umur Anak:</strong></span>
                                <span>
                                    @php
                                        $birthDate = \Carbon\Carbon::parse($surveyResponse->birth_date);
                                        $ageYears = $birthDate->diffInYears(now());
                                        $ageMonths = $birthDate->copy()->addYears($ageYears)->diffInMonths(now());
                                    @endphp
                                    {{ $ageYears }} tahun {{ $ageMonths }} bulan
                                </span>
                            </div>
                            <div class="flex justify-between w-full mb-2">
                                <span class="font-medium"><strong>Jenis Kelamin:</strong></span>
                                <span>{{ $surveyResponse->gender }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Display Evaluation Message and Image --}}
                    <div class="flex flex-col items-center mb-4">
                        @if ($surveyResponse->hasil >= 76)
                            <p class="text-green-500 font-semibold">kriteria: Baik</p>
                            <img src="{{ asset('path/to/good_image.jpg') }}" alt="Baik"
                                class="h-16 w-16 object-cover mb-2">
                        @elseif ($surveyResponse->hasil >= 56)
                            <p class="text-yellow-500 font-semibold">kriteria: Sedang</p>
                            <img src="{{ asset('path/to/average_image.jpg') }}" alt="Sedang"
                                class="h-16 w-16 object-cover mb-2">
                        @else
                            <p class="text-red-500 font-semibold">kriteria: Buruk</p>
                            <img src="{{ asset('path/to/bad_image.jpg') }}" alt="Buruk"
                                class="h-16 w-16 object-cover mb-2">
                        @endif
                    </div>

                    {{-- Image Selection Form --}}
                    <form action="{{ route('survey.response.image.store', $surveyResponse->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col items-center mb-4">
                            <label class="text-lg font-semibold mb-2">Pilih Gambar:</label>

                            <!-- Assume you have a list of images to choose from -->
                            <div class="grid grid-cols-3 gap-4">
                                @foreach ($images as $image)
                                    <!-- $images should be an array of image data -->
                                    <div class="flex flex-col items-center">
                                        <input type="radio" id="image_{{ $image->id }}" name="image_id"
                                            value="{{ $image->id }}" class="hidden">
                                        <label for="image_{{ $image->id }}" class="cursor-pointer">
                                            <img src="{{ asset('storage/' . $image->path) }}"
                                                alt="{{ $image->description }}"
                                                class="h-32 w-32 object-cover mb-2 border-2 border-transparent hover:border-blue-500">
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Kirim Gambar</button>
                    </form>

                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('chart').getContext('2d');
            if (ctx) {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Performa', 'Sisa'],
                        datasets: [{
                            data: [{{ $surveyResponse->hasil ?? 0 }}, 100 -
                                {{ $surveyResponse->hasil ?? 0 }}
                            ],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.6)', // Performa color
                                'rgba(255, 255, 255, 1)' // Sisa color
                            ],
                            borderColor: [
                                'rgba(0, 0, 0, 0.1)', // Border color
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false // Hide default legend if using custom
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw +
                                            '%'; // Tooltip label format
                                    }
                                }
                            }
                        }
                    }
                });
            } else {
                console.error('Failed to get context for chart');
            }
        });
    </script>
@endsection
