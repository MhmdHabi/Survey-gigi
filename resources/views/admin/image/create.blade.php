@extends('layouts.master')

@section('title', 'Buat Image')

@section('content')
    <div class="container flex w-full justify-center items-center h-screen mx-auto p-4">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Upload New Image</h2>

            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc text-red-500 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.image.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Image Upload -->
                <div class="mb-4">
                    <label for="path" class="block text-gray-700 font-medium mb-2">Image</label>
                    <input type="file" name="path" id="path" accept="image/*"
                        class="w-full border-gray-300 rounded-md focus:ring focus:ring-blue-200" required
                        onchange="previewImage(event)">
                </div>

                <!-- Image Preview -->
                <div class="mb-4" id="imagePreviewContainer" style="display: none;">
                    <label class="block text-gray-700 font-medium mb-2">Image Preview</label>
                    <img id="imagePreview" src="" alt="Image Preview"
                        class="w-full h-48 object-cover border border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label for="keterangan" class="block text-gray-700 font-medium mb-2">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan"
                        class="w-full border-gray-300 rounded-md focus:ring focus:ring-blue-200" required>
                </div>

                <!-- Hasil Image (Optional) -->
                <div class="mb-4">
                    <label for="nilai_image" class="block text-gray-700 font-medium mb-2">Nilai Image</label>
                    <input type="number" name="nilai_image" id="nilai_image"
                        class="w-full border-gray-300 rounded-md focus:ring focus:ring-blue-200">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Upload
                        Image</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result; // Set the source of the image preview
                    imagePreviewContainer.style.display = 'block'; // Show the image preview container
                };
                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                imagePreviewContainer.style.display = 'none'; // Hide the image preview if no file is selected
            }
        }
    </script>
@endsection
