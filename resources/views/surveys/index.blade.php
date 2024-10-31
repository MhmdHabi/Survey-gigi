@extends('layouts.app')

@section('title', 'Daftar Survei')

@section('content')
    <div class="container mx-auto mt-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Daftar Survei</h2>
            <a class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600" href="{{ route('surveys.tampil') }}">Buat
                Survei</a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border-b">Judul</th>
                    <th class="py-2 px-4 border-b">Deskripsi</th>
                    <th class="py-2 px-4 border-b">Jumlah Pertanyaan</th> <!-- New Column -->
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surveys as $survey)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $survey->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $survey->description }}</td>
                        <td class="py-2 px-4 border-b">{{ $survey->questions_count }}</td> <!-- Count of Questions -->
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('surveys.show', $survey->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Lihat</a>
                            <a href="{{ route('surveys.edit', $survey->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus survei ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
