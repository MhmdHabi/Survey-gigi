@extends('layouts.dashboard')

@section('title', 'Daftar Survei')

@section('content')
    <div class="container mx-auto mt-4 bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Daftar Survei</h2>
            <a class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition duration-300"
                href="{{ route('surveys.create') }}">
                <i class="fas fa-plus mr-2"></i> Buat Survei
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
                <thead>
                    <tr class="bg-gray-200 border-b border-gray-300">
                        <th class="py-3 px-4 border-r border-gray-300 text-left text-gray-700">Judul</th>
                        <th class="py-3 px-4 border-r border-gray-300 text-left text-gray-700">Deskripsi</th>
                        <th class="py-3 px-4 border-r border-gray-300 text-left text-gray-700">Jumlah Pertanyaan</th>
                        <th class="py-3 px-4 text-left text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surveys as $survey)
                        <tr class="hover:bg-gray-100 border-b border-gray-300 transition duration-300">
                            <td class="py-2 px-4 border-r border-gray-300">{{ $survey->title }}</td>
                            <td class="py-2 px-4 border-r border-gray-300">{{ $survey->description }}</td>
                            <td class="py-2 px-4 border-r border-gray-300">{{ $survey->questions_count }}</td>
                            <td class="py-2 px-4 flex justify-center items-center space-x-2">
                                <a href="{{ route('surveys.show', $survey->id) }}"
                                    class="bg-blue-600 text-white p-2 rounded-lg shadow hover:bg-blue-700 transition duration-300 flex items-center justify-center">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('surveys.edit', $survey->id) }}"
                                    class="bg-yellow-500 text-white p-2 rounded-lg shadow hover:bg-yellow-600 transition duration-300 flex items-center justify-center">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white p-2 rounded-lg shadow hover:bg-red-700 transition duration-300 flex items-center justify-center"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus survei ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
