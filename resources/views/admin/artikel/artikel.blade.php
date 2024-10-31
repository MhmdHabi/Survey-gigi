@extends('layouts.dashboard')

@section('content')
    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Notifikasi Error --}}
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <div class="bg-[#5DB9FF] p-6 rounded-lg">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl lg:text-2xl font-semibold text-white">Daftar Artikel</h2>
            <div class="flex space-x-2 items-center">
                <a href="{{ route('artikel.add') }}"
                    class="bg-orange-500 text-white px-4 py-2 md:text-md lg:text-lg rounded flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Artikel
                </a>
                <a href=""
                    class="bg-yellow-500 text-white px-4 py-2 md:text-md lg:text-lg rounded flex items-center">
                    <i class="fas fa-file-pdf mr-2"></i>
                    Export PDF
                </a>
                <a href="" class="bg-green-500 text-white px-4 py-2 md:text-md lg:text-lg rounded flex items-center">
                    <i class="fas fa-file-csv mr-2"></i>
                    Export CSV
                </a>
                <a href="" class="bg-gray-700 text-white px-4 py-2 md:text-md lg:text-lg rounded flex items-center">
                    <i class="fas fa-file-excel mr-2"></i>
                    Export Excel
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border border-gray-300 font-normal text-md">No</th>
                        <th class="py-2 px-4 border border-gray-300 font-normal text-md">Gambar</th>
                        <th class="py-2 px-4 border border-gray-300 font-normal text-md">Judul</th>
                        <th class="py-2 px-4 border border-gray-300 font-normal text-md">Deskripsi</th>
                        <th class="py-2 px-4 border border-gray-300 font-normal text-md">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artikels as $index => $artikel)
                        <tr>
                            <td class="py-2 px-4 border border-gray-300 text-center">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border border-gray-300">
                                <img src="{{ asset('storage/' . $artikel->image_path) }}" alt="{{ $artikel->title }}"
                                    class="h-16 w-16 object-cover mx-auto">
                            </td>
                            <td class="py-2 px-4 border border-gray-300">{{ $artikel->title }}</td>
                            <td class="py-2 px-4 border border-gray-300">{{ Str::limit($artikel->description, 50) }}</td>
                            <td class="py-5 px-4 flex justify-center items-center space-x-2">
                                <a href="{{ route('artikel.edit', $artikel->id) }}"
                                    class="text-blue-500 hover:text-blue-700 p-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('artikel.delete', $artikel->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 p-2">
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
