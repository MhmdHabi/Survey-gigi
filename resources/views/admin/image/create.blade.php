@extends('layouts.dashboard')

@section('title', 'Buat Image')

@section('content')
    <div class="container flex w-full justify-center items-center mx-auto p-4">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg border border-gray-200">
            <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Upload New Image</h2>

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
                <div class="mb-6">
                    <label for="path" class="block text-gray-700 font-medium mb-2">Image</label>
                    <input type="file" name="path" id="path" accept="image/*"
                        class="w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-200 transition duration-200 ease-in-out py-2 px-3"
                        required onchange="previewImage(event)">
                </div>

                <!-- Image Preview -->
                <div class="mb-6" id="imagePreviewContainer" style="display: none;">
                    <label class="block text-gray-700 font-medium mb-2">Image Preview</label>
                    <img id="imagePreview" src="" alt="Image Preview"
                        class="w-full h-48 object-cover border border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mb-6">
                    <label for="keterangan" class="block text-gray-700 font-medium mb-2">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan"
                        class="w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-200 transition duration-200 ease-in-out py-2 px-3"
                        required>
                </div>

                <!-- Hasil Image (Optional) -->
                <div class="mb-6">
                    <label for="nilai_image" class="block text-gray-700 font-medium mb-2">Nilai Image</label>
                    <input type="number" name="nilai_image" id="nilai_image"
                        class="w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-200 transition duration-200 ease-in-out py-2 px-3">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-3 rounded-md shadow hover:bg-blue-600 transition duration-200 ease-in-out">Upload
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
