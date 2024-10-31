@extends('layouts.dashboard')

@section('content')
    <div class="bg-blue-50 p-6 rounded-lg mx-auto">
        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ route('admin.artikel') }}" class="flex items-center text-[#5DB9FF] hover:text-blue-600 font-semibold">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Artikel
            </a>
        </div>

        <h2 class="text-2xl font-bold text-[#5DB9FF] mb-4 text-center">Tambah Artikel Baru</h2>

        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Input Judul -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Judul Artikel</label>
                <input type="text" name="title" id="title" required
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#5DB9FF]">
            </div>

            <!-- Input Deskripsi -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea name="description" id="description" rows="4" required
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#5DB9FF]"></textarea>
            </div>

            <!-- Input Gambar -->
            <div class="mb-6">
                <label for="image_path" class="block text-gray-700 font-semibold mb-2">Gambar Artikel</label>
                <input type="file" name="image_path" id="image_path" accept="image/*" required
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#5DB9FF]">
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-center">
                <button type="submit" class="bg-[#5DB9FF] text-white px-6 py-2 rounded font-semibold hover:bg-blue-600">
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>
@endsection
