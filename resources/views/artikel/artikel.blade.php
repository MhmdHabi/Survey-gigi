@extends('layouts.master')

@section('title', 'Artikel')

@section('content')
    <section class="mt-16 py-16 px-8 md:px-16 bg-gray-50">
        <h2 class="text-3xl font-semibold text-center mb-8">Artikel Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($artikels as $artikel)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
                    <img src="{{ asset('storage/' . $artikel->image_path) }}" alt="{{ $artikel->title }}"
                        class="w-full h-48 object-cover" />
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $artikel->title }}</h3>
                        <p class="text-gray-600 mb-4 truncate-deskripsi">
                            {{ $artikel->description }}
                        </p>
                        <a href="{{ route('artikel.show', $artikel->id) }}" class="text-blue-500 hover:underline">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
