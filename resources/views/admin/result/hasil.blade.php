@extends('layouts.dashboard')

@section('title', 'Hasil Survei')

@section('content')
    <div class="container mx-auto mt-4 p-6 bg-white shadow-lg rounded-lg">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Hasil Survei</h2>
            <div class="flex space-x-3">
                <a href="{{ route('survey.export') }}"
                    class="bg-green-500 text-white font-semibold py-2 px-4 rounded hover:bg-green-600 transition duration-300 flex items-center">
                    <i class="fas fa-file-excel mr-2"></i> <!-- Excel Icon -->
                    Export to Excel
                </a>
                <a href="{{ route('survey.export.csv') }}"
                    class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-800 transition duration-300 flex items-center">
                    <i class="fas fa-file-csv mr-2"></i> <!-- CSV Icon -->
                    Export to CSV
                </a>
            </div>
        </div>

        <!-- Tabel Hasil Survei -->
        <div class="overflow-x-auto mt-4">
            <table id="survey-table" class="min-w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 border-b border-gray-300">
                        <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Judul Survei</th>
                        <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Nama Orang Tua
                        </th>
                        <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Nama Anak</th>
                        <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Tanggal Lahir
                        </th>
                        <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Umur</th>
                        <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Jenis Kelamin
                        </th>
                        <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Hasil</th>
                        <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Gambar Survey
                        </th>
                        <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Nilai Gambar</th>
                        <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surveyResponses as $response)
                        <tr class="bg-gray-50 border-b border-gray-300 hover:bg-gray-100 transition duration-200">
                            <td class="border border-gray-300 p-4 text-sm">{{ $response->survey->title }}</td>
                            <td class="border border-gray-300 p-4 text-sm">{{ $response->user->name }}</td>
                            <td class="border border-gray-300 p-4 text-sm">{{ $response->child_name }}</td>
                            <td class="border border-gray-300 p-4 text-sm">{{ $response->birth_date }}</td>
                            <td class="border border-gray-300 p-4 text-sm">
                                {{ \Carbon\Carbon::parse($response->birth_date)->diffInYears(now()) }}
                            </td>
                            <td class="border border-gray-300 p-4 text-sm">{{ $response->gender }}</td>
                            <td class="border border-gray-300 p-4 text-sm">{{ $response->hasil }}%</td>
                            <td class="border border-gray-300 p-4 text-center">
                                @if ($response->image)
                                    <img src="{{ asset('storage/' . $response->image->path) }}" alt="Image"
                                        class="w-32 h-32 object-cover">
                                    <p>{{ $response->image->keterangan }}</p>
                                @else
                                    <p>Tidak ada gambar.</p>
                                @endif
                            </td>
                            <td class="border border-gray-300 p-4 text-center">
                                @if ($response->image)
                                    {{ $response->image->nilai_image }}
                                @else
                                    <p>Tidak ada gambar.</p>
                                @endif
                            </td>
                            <td class="border border-gray-300 p-4 text-center">
                                <a href="{{ route('admin.result.show', ['surveyId' => $response->survey_id, 'surveyResponId' => $response->id]) }}"
                                    class="text-blue-500 hover:text-blue-700 transition duration-300">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- CDN jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Custom CSS untuk jarak antara search input dan tabel -->
    <style>
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1rem;
            /* Menambah jarak antara input pencarian dan tabel */
        }
    </style>

    <!-- DataTables Initialization Script -->
    <script>
        $(document).ready(function() {
            $('#survey-table').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
