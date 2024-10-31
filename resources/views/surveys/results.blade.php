@extends('layouts.app')

@section('title', 'Hasil Survei')

@section('content')
    <div class="container mx-auto mt-4">
        <h2 class="text-2xl font-bold">Hasil Survei</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @if ($surveyResponses->isEmpty())
            <p>Tidak ada hasil survei yang ditemukan.</p>
        @else
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="border-b px-4 py-2 text-left">Judul Survei</th>
                        <th class="border-b px-4 py-2 text-left">Nama Orang Tua</th>
                        <th class="border-b px-4 py-2 text-left">Nama Anak</th>
                        <th class="border-b px-4 py-2 text-left">Tanggal Lahir</th>
                        <th class="border-b px-4 py-2 text-left">Gender</th>
                        <th class="border-b px-4 py-2 text-left">Hasil (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surveyResponses as $response)
                        <tr>
                            <td class="border-b px-4 py-2">{{ $response->title }}</td>
                            <td class="border-b px-4 py-2">{{ $response->parent_name }}</td> <!-- Nama orang tua -->
                            <td class="border-b px-4 py-2">{{ $response->child_name }}</td>
                            <td class="border-b px-4 py-2">{{ $response->birth_date }}</td>
                            <td class="border-b px-4 py-2">{{ $response->gender }}</td>
                            <td class="border-b px-4 py-2">{{ number_format($response->hasil, 2) }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
