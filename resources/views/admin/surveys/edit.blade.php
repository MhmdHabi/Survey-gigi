@extends('layouts.dashboard')

@section('title', 'Edit Survei')

@section('content')
    <div class="container mx-auto mt-6 bg-white shadow-lg rounded-lg p-6">
        <a href="{{ route('surveys.index') }}"
            class="bg-blue-600 hover:bg-blue-700 mb-2 text-white font-bold py-2 px-4 rounded mt-4 inline-block transition duration-200">Kembali</a>
        <h2 class="text-3xl font-bold text-blue-600 mb-4">Edit Survei: {{ $survey->title }}</h2>
        <form action="{{ route('surveys.update', $survey->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Survei</label>
                <input type="text" id="title" name="title"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                    value="{{ $survey->title }}" required>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Survei</label>
                <textarea id="description" name="description"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                    rows="4" required>{{ $survey->description }}</textarea>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar Survei</label>
                <input type="file" id="image" name="image"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                    onchange="previewImage(event)">
                <div class="flex space-x-5">
                    @if ($survey->image)
                        <div>
                            <img src="{{ asset('storage/' . $survey->image) }}" alt="Survey Image"
                                class="mt-2 w-48 h-48 object-cover rounded-md">
                            <p class="mt-1 text-sm text-gray-600">Gambar Saat Ini</p>
                        </div>
                    @endif
                    <div id="image-preview" class="mt-2" style="display: none;">
                        <img id="new-image" src="" alt="New Survey Image Preview"
                            class="w-48 h-48 object-cover rounded-md">
                        <p class="mt-1 text-sm text-gray-600">Preview Gambar Baru</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-between mt-6">
                <button type="submit"
                    class="bg-green-600 text-white font-semibold py-2 px-6 rounded-md hover:bg-green-700 transition duration-200">Perbarui
                    Survei</button>
                <a href="{{ route('surveys.index') }}"
                    class="bg-gray-600 text-white font-semibold py-2 px-6 rounded-md hover:bg-gray-700 transition duration-200">Batal</a>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            const newImage = document.getElementById('new-image');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    newImage.src = e.target.result;
                    imagePreview.style.display = 'block'; // Show the preview
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none'; // Hide the preview if no file is selected
            }
        }
    </script>
@endsection
