@extends('layouts.dashboard')

@section('content')
    <div class="bg-blue-100 p-6 rounded-lg">
        <div class="flex items-center mb-6">
            <a href="{{ route('admin.artikel') }}" class="text-[#5DB9FF] hover:text-blue-700 text-lg mr-4">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Artikel
            </a>
        </div>
        <h2 class="text-2xl font-bold text-[#5DB9FF] text-center mb-2">Edit Artikel</h2>

        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Judul Artikel</label>
                <input type="text" id="title" name="title" value="{{ old('title', $artikel->title) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi Artikel</label>
                <textarea id="description" name="description" class="w-full px-4 py-2 border border-gray-300 rounded" required>{{ old('description', $artikel->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image_path" class="block text-gray-700 font-medium mb-2">Gambar Artikel</label>
                <input type="file" id="image_path" name="image_path"
                    class="w-full px-4 py-2 border border-gray-300 rounded">
                @if ($artikel->image_path)
                    <img src="{{ asset('storage/' . $artikel->image_path) }}" alt="Current Image"
                        class="h-20 w-20 mt-2 object-cover rounded">
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-[#5DB9FF] text-white px-6 py-2 rounded hover:bg-[#48A3E0]">
                    Update Artikel
                </button>
            </div>
        </form>
    </div>
@endsection
