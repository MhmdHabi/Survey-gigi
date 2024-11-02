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
            {{-- Memastikan surveyResponse ada --}}
            <p>Tidak ada hasil survei yang ditemukan.</p>
        @else
            <div class="bg-white shadow-lg rounded-lg p-4 mb-6 max-w-lg mx-auto"> {{-- Kecilkan ukuran kartu --}}
                <h3 class="text-lg font-semibold text-center mb-3">{{ $surveyResponse->title }}</h3>
                <canvas id="chart" width="100" height="100" class="mb-4 p-7"></canvas> {{-- Kecilkan ukuran chart --}}

                <!-- Display score below the chart -->
                <div class="text-center mt-4">
                    <p class="text-lg font-semibold">Skor:</p>
                    <p class="text-3xl font-bold text-blue-400">{{ $surveyResponse->hasil ?? 0 }}%</p>
                </div>

                <div class="flex justify-center mb-2 mt-4">
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

                <div class="flex flex-col">
                    <div class="flex justify-between mb-1">
                        <span><strong>Nama Orang Tua :</strong></span>
                        <span>{{ $surveyResponse->parent_name }}</span>
                    </div>
                    <div class="flex justify-between mb-1">
                        <span><strong>Nama Anak :</strong></span>
                        <span>{{ $surveyResponse->child_name }}</span>
                    </div>
                    <div class="flex justify-between mb-1">
                        <span><strong>Tgl Lahir :</strong></span>
                        <span>{{ \Carbon\Carbon::parse($surveyResponse->birth_date)->locale('id')->translatedFormat('l, d F Y') }}</span>
                    </div>
                    <div class="flex justify-between mb-1">
                        <span><strong>Umur Anak :</strong></span>
                        <span> @php
                            $birthDate = \Carbon\Carbon::parse($surveyResponse->birth_date);
                            $ageYears = $birthDate->diffInYears(now());
                            $ageMonths = $birthDate->copy()->addYears($ageYears)->diffInMonths(now());
                        @endphp
                            {{ $ageYears }} tahun {{ $ageMonths }} bulan</span>
                    </div>
                    <div class="flex justify-between mb-1">
                        <span><strong>Jenis Kelamin :</strong></span>
                        <span>{{ $surveyResponse->gender }}</span>
                    </div>
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
