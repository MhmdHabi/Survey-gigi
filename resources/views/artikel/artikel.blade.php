@extends('layouts.master')

@section('title', 'Artikel')

@section('content')
    <section class="mt-16 py-16 px-8 md:px-16 bg-gray-50">
        <h2 class="text-3xl font-semibold text-center mb-8">Artikel Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Article 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/article1.jpg" alt="Artikel 1" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Judul Artikel 1</h3>
                    <p class="text-gray-600 mb-4">
                        Deskripsi singkat tentang artikel 1. Artikel ini membahas tentang ...
                    </p>
                    <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/article2.jpg" alt="Artikel 2" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Judul Artikel 2</h3>
                    <p class="text-gray-600 mb-4">
                        Deskripsi singkat tentang artikel 2. Artikel ini membahas tentang ...
                    </p>
                    <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Article 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/article3.jpg" alt="Artikel 3" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Judul Artikel 3</h3>
                    <p class="text-gray-600 mb-4">
                        Deskripsi singkat tentang artikel 3. Artikel ini membahas tentang ...
                    </p>
                    <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Add more articles as needed -->
        </div>
    </section>

@endsection
