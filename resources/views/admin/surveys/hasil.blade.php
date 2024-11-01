@extends('layouts.dashboard')

@section('title', 'Hasil Survei')

@section('content')
    <div class="container mx-auto mt-4 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-gray-800">Hasil Survei</h2>
        <table class="min-w-full mt-4 border border-gray-300">
            <thead>
                <tr class="bg-gray-200 border-b border-gray-300">
                    <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Judul Survei</th>
                    <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Nama Orang Tua</th>
                    <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Nama Anak</th>
                    <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Tanggal Lahir</th>
                    <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Gender</th>
                    <th class="border border-gray-300 p-4 text-left text-sm font-medium text-gray-600">Hasil</th>
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
                        <td class="border border-gray-300 p-4 text-sm">{{ $response->gender }}</td>
                        <td class="border border-gray-300 p-4 text-sm">{{ $response->hasil }}%</td>
                        <td class="border border-gray-300 p-4 text-center">
                            <a href="" class="text-blue-500 hover:text-blue-700 transition duration-300">
                                <i class="fas fa-eye"></i> <!-- Ikon show menggunakan Font Awesome -->
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
