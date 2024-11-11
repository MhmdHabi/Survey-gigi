@extends('layouts.master')

@section('title', 'Hasil Survei')

@section('content')
    <div class="mt-16 py-7 lg:py-16 px-4 md:px-8 bg-gray-50">
        <h2 class="text-2xl font-bold mb-3">Hasil Survei</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600 text-center">
                {{ session('success') }}
            </div>
        @endif

        @if (!$surveyResponse)
            <p class="text-center text-gray-600">Tidak ada hasil survei yang ditemukan.</p>
        @else
            <div
                class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg p-6 lg:p-8 space-y-6 md:space-y-0 md:space-x-6">
                {{-- Left Section --}}
                <div class="md:w-1/2 lg:w-1/3">
                    <form class="pb-3" action="{{ route('survey.response.image.store', $surveyResponse->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col items-center mb-4 px-3">
                            <label class="text-lg font-semibold mb-2">Pilih Gambar:</label>

                            {{-- Instructional Note --}}
                            <p class="text-sm text-gray-500 mb-4 text-center">
                                Pilih foto yang paling sesuai dengan keadaan besar anak Anda saat ini untuk memberikan
                                dukungan
                                yang tepat.
                            </p>

                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($images as $image)
                                    <div class="flex flex-col items-center">
                                        <input type="radio" id="image_{{ $image->id }}" name="image_id"
                                            value="{{ $image->id }}" class="hidden">
                                        <label for="image_{{ $image->id }}" class="cursor-pointer image-label">
                                            <img src="{{ asset('storage/' . $image->path) }}"
                                                alt="{{ $image->description }}"
                                                class="h-32 w-32 object-cover mb-2 rounded border-2 border-transparent hover:border-blue-500 transition duration-300">
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit"
                                class="bg-blue-400 text-white mt-4 py-2 px-6 rounded hover:bg-blue-500 transition duration-200">
                                Kirim Gambar
                            </button>
                        </div>
                    </form>

                    <h3 class="text-2xl font-semibold capitalize mt-3 text-center mb-7">{{ $surveyResponse->title }}</h3>
                    <canvas id="chart" width="250" height="250" class="mb-4 mx-auto max-w-md"></canvas>

                    <h2 class="text-center font-semibold text-lg py-2">Skor: <span>{{ $surveyResponse->hasil }}%</span></h2>
                    <div class="flex justify-center mb-2 space-x-4">
                        <span>
                            <span
                                style="display:inline-block; width: 12px; height: 12px; background-color: rgba(75, 192, 192, 0.6);"></span>
                            Performa
                        </span>
                        <span>
                            <span
                                style="display:inline-block; width: 12px; height: 12px; background-color: rgba(255, 255, 255, 1);"></span>
                            Sisa
                        </span>
                    </div>
                </div>

                {{-- Right Section --}}
                <div class="md:w-1/2 lg:w-2/3 space-y-6">
                    <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                        <h3 class="text-xl font-semibold text-gray-700 mb-3">Detail Informasi</h3>
                        <div class="space-y-2 text-gray-600">
                            <div class="flex justify-between">
                                <strong>Nama Orang Tua:</strong> <span>{{ $surveyResponse->parent_name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <strong>Nama Anak:</strong> <span>{{ $surveyResponse->child_name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <strong>Tgl Lahir:</strong>
                                <span>{{ \Carbon\Carbon::parse($surveyResponse->birth_date)->locale('id')->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <strong>Umur Anak:</strong>
                                <span>
                                    @php
                                        $birthDate = \Carbon\Carbon::parse($surveyResponse->birth_date);
                                        $ageYears = $birthDate->diffInYears(now());
                                        $ageMonths = $birthDate->copy()->addYears($ageYears)->diffInMonths(now());
                                    @endphp
                                    {{ $ageYears }} tahun {{ $ageMonths }} bulan
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <strong>Jenis Kelamin:</strong> <span>{{ $surveyResponse->gender }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Evaluation Message --}}
                    <div class="text-center mt-6">
                        @if ($surveyResponse->hasil >= 76)
                            <p class="text-green-500 text-xl font-semibold">Kriteria: {{ $criteriaLabels['good'] }}</p>
                        @elseif ($surveyResponse->hasil >= 56)
                            <p class="text-yellow-500 text-xl font-semibold">Kriteria: {{ $criteriaLabels['fair'] }}</p>
                        @else
                            <p class="text-red-500 text-xl font-semibold">Kriteria: {{ $criteriaLabels['poor'] }}</p>
                        @endif
                    </div>


                    {{-- Criteria Table --}}
                    <div class="pt-4">
                        <h3 class="text-xl font-bold mb-4">Kriteria Penilaian</h3>
                        <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-3 px-4 text-left font-semibold">Kriteria</th>
                                    <th class="py-3 px-4 text-left font-semibold">Rentang Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t border-gray-300">
                                    <td class="py-3 px-4">{{ $criteriaLabels['good'] }}</td>
                                    <td class="py-3 px-4">76% - 100%</td>
                                </tr>
                                <tr class="bg-gray-100 border-t border-gray-300">
                                    <td class="py-3 px-4">{{ $criteriaLabels['fair'] }}</td>
                                    <td class="py-3 px-4">56% - 75%</td>
                                </tr>
                                <tr class="border-t border-gray-300">
                                    <td class="py-3 px-4">{{ $criteriaLabels['poor'] }}</td>
                                    <td class="py-3 px-4">&lt; 56%</td>
                                </tr>
                            </tbody>
                        </table>
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

        // Highlight selected image
        document.querySelectorAll('input[name="image_id"]').forEach((input) => {
            input.addEventListener('change', function() {
                // Remove the highlight from all labels
                document.querySelectorAll('.image-label').forEach(label => {
                    label.classList.remove('border-blue-500', 'ring-2', 'ring-blue-500');
                });
                // Add highlight to the selected label
                const selectedLabel = document.querySelector(`label[for="${this.id}"]`);
                if (selectedLabel) {
                    selectedLabel.classList.add('border-blue-500', 'ring-2', 'ring-blue-500');
                }
            });
        });
    </script>

    <style>
        .image-label:hover {
            border-color: rgba(75, 192, 192, 0.6);
            /* Change hover color if needed */
        }

        .image-label.border-blue-500 {
            border-color: blue;
            /* Highlight color when selected */
            outline: 2px solid rgba(75, 192, 192, 0.6);
            /* Optional additional styling */
        }
    </style>
@endsection
