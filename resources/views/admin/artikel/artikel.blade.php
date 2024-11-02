@extends('layouts.dashboard')

@section('content')
    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 shadow-md"
            role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Notifikasi Error --}}
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 shadow-md" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Daftar Artikel</h2>
            <div class="flex space-x-2 items-center">
                <a href="{{ route('artikel.add') }}"
                    class="bg-orange-500 font-medium text-white px-4 py-2 rounded-md flex items-center transition duration-300 hover:bg-orange-600">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Artikel
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-4 border border-gray-300 font-medium text-md text-left text-gray-700">No</th>
                        <th class="py-3 px-4 border border-gray-300 font-medium text-md text-left text-gray-700">Gambar
                        </th>
                        <th class="py-3 px-4 border border-gray-300 font-medium text-md text-left text-gray-700">Judul
                        </th>
                        <th class="py-3 px-4 border border-gray-300 font-medium text-md text-left text-gray-700">Deskripsi
                        </th>
                        <th class="py-3 px-4 border border-gray-300 font-medium text-md text-left text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artikels as $index => $artikel)
                        <tr class="hover:bg-gray-100 transition duration-300">
                            <td class="py-2 px-4 border border-gray-300 text-center text-gray-600">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border border-gray-300">
                                <img src="{{ asset('storage/' . $artikel->image_path) }}" alt="{{ $artikel->title }}"
                                    class="h-16 w-16 object-cover mx-auto rounded-md">
                            </td>
                            <td class="py-2 px-4 border border-gray-300 text-gray-800 font-medium">{{ $artikel->title }}
                            </td>
                            <td class="py-2 px-4 border border-gray-300 text-gray-600">
                                {{ Str::limit($artikel->description, 50) }}</td>
                            <td class="py-5 px-4 border border-gray-300 flex justify-center items-center space-x-2">
                                <a href="{{ route('artikel.edit', $artikel->id) }}"
                                    class="text-blue-500 hover:text-blue-700 transition duration-300 p-2"
                                    title="Edit Artikel">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('artikel.delete', $artikel->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 transition duration-300 p-2"
                                        title="Hapus Artikel">
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
