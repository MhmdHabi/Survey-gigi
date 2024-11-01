@extends('layouts.dashboard')

@section('title', 'Edit Survei')

@section('content')
    <div class="container mx-auto mt-6 bg-white shadow-lg rounded-lg p-6">
        <a href="{{ route('surveys.index') }}"
            class="bg-blue-600 hover:bg-blue-700 mb-2 text-white font-bold py-2 px-4 rounded mt-4 inline-block transition duration-200">Kembali</a>
        <h2 class="text-3xl font-bold text-blue-600 mb-4">Edit Survei: {{ $survey->title }}</h2>
        <form action="{{ route('surveys.update', $survey->id) }}" method="POST">
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

            <div class="flex justify-between mt-6">
                <button type="submit"
                    class="bg-green-600 text-white font-semibold py-2 px-6 rounded-md hover:bg-green-700 transition duration-200">Perbarui
                    Survei</button>
                <a href="{{ route('surveys.index') }}"
                    class="bg-gray-600 text-white font-semibold py-2 px-6 rounded-md hover:bg-gray-700 transition duration-200">Batal</a>
            </div>
        </form>
    </div>
@endsection
