@extends('layouts.master')

@section('title', $artikel->title)

@section('content')
    <section class="mt-16 py-16 px-8 md:px-16 bg-gray-50">
        <!-- Kembali ke Artikel Icon -->
        <a href="{{ route('artikel') }}" class="inline-flex items-center text-blue-500 hover:underline mb-4">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="{{ asset('storage/' . $artikel->image_path) }}" alt="{{ $artikel->title }}"
                class="w-full h-96 object-cover" />

            <div class="p-4">
                <h2 class="text-2xl font-semibold mb-4">{{ $artikel->title }}</h2>
                <p class="text-gray-600 mb-4">{{ $artikel->description }}</p>
            </div>
        </div>
    </section>
@endsection
