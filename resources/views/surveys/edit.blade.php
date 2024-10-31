@extends('layouts.app')

@section('title', 'Edit Survei')

@section('content')
    <div class="container mx-auto mt-4">
        <h2 class="text-2xl font-bold">Edit Survei: {{ $survey->title }}</h2>
        <form action="{{ route('surveys.update', $survey->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Survei</label>
                <input type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="title"
                    value="{{ $survey->title }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Survei</label>
                <textarea class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="description" required>{{ $survey->description }}</textarea>
            </div>

            <div class="flex justify-between mt-4">
                <button type="submit"
                    class="bg-green-500 text-white font-semibold py-2 px-4 rounded hover:bg-green-600">Perbarui
                    Survei</button>
                <a href="{{ route('surveys.index') }}"
                    class="bg-gray-500 text-white font-semibold py-2 px-4 rounded hover:bg-gray-600">Batal</a>
            </div>
        </form>
    </div>

@endsection
