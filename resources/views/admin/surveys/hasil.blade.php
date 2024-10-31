@extends('layouts.dashboard')

@section('title', 'Hasil Survei')

@section('content')
    <div class="container mx-auto mt-4">
        <h2 class="text-2xl font-bold">Hasil Survei</h2>
        <table class="min-w-full mt-4 border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 p-2">Judul Survei</th>
                    <th class="border border-gray-300 p-2">Nama Orang Tua</th>
                    <th class="border border-gray-300 p-2">Nama Anak</th>
                    <th class="border border-gray-300 p-2">Tanggal Lahir</th>
                    <th class="border border-gray-300 p-2">Gender</th>
                    <th class="border border-gray-300 p-2">Hasil</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surveyResponses as $response)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $response->survey->title }}</td>
                        <td class="border border-gray-300 p-2">{{ $response->user->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $response->child_name }}</td>
                        <td class="border border-gray-300 p-2">{{ $response->birth_date }}</td>
                        <td class="border border-gray-300 p-2">{{ $response->gender }}</td>
                        <td class="border border-gray-300 p-2">{{ $response->hasil }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
