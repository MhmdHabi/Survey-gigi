<section id="survey" class="bg-blue-50 py-16">
    <div class="container mx-auto px-8 md:px-16">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-black mb-10">Survei Kesehatan Gigi</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Survey 1: Pemberian Susu Formula -->
            <div class="border rounded-lg p-6 bg-white shadow-md flex flex-col" data-aos="fade-up" data-aos-duration="1000"
                data-aos-easing="ease-in-out">
                <img src="{{ asset('assets/survey-susu.png') }}" alt="Pemberian Susu Formula"
                    class="w-full h-48 object-cover mb-4 rounded-lg">
                <h3 class="text-xl font-semibold text-black mb-2">Pemberian Susu Formula</h3>
                <p class="text-gray-700 mb-4">Ikuti survei untuk mengetahui seberapa besar pengaruh pemberian susu
                    formula terhadap kesehatan gigi anak.</p>
                <div class="mt-auto">
                    <a href="{{ route('susu') }}"
                        class="relative inline-block px-6 py-2 border border-[#5DB9FF] text-black rounded-full overflow-hidden group">
                        <span
                            class="absolute inset-0 w-full h-full bg-[#5DB9FF] transform -translate-x-full transition-transform duration-300 ease-in-out group-hover:translate-x-0"></span>
                        <span
                            class="relative z-10 transition-colors duration-300 ease-in-out group-hover:text-white">Ikuti
                            Survei</span>
                    </a>
                </div>
            </div>

            <!-- Survey 2: Menyikat Gigi -->
            <div class="border rounded-lg p-6 bg-white shadow-md flex flex-col" data-aos="fade-up"
                data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-delay="100">
                <img src="{{ asset('assets/survey-gigi.jpeg') }}" alt="Survey Menyikat Gigi"
                    class="w-full h-48 object-cover mb-4 rounded-lg">
                <h3 class="text-xl font-semibold text-black mb-2">Survey Menyikat Gigi</h3>
                <p class="text-gray-700 mb-4">Berikan pendapat Anda mengenai kebiasaan menyikat gigi anak dan dampaknya
                    terhadap kesehatan gigi.</p>
                <div class="mt-auto">
                    <a href="{{ route('gigi') }}"
                        class="relative inline-block px-6 py-2 border border-[#5DB9FF] text-black rounded-full overflow-hidden group">
                        <span
                            class="absolute inset-0 w-full h-full bg-[#5DB9FF] transform -translate-x-full transition-transform duration-300 ease-in-out group-hover:translate-x-0"></span>
                        <span
                            class="relative z-10 transition-colors duration-300 ease-in-out group-hover:text-white">Ikuti
                            Survei</span>
                    </a>
                </div>
            </div>

            <!-- Survey 3: Pola Asuh Orang Tua -->
            <div class="border rounded-lg p-6 bg-white shadow-md flex flex-col" data-aos="fade-up"
                data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-delay="200">
                <img src="{{ asset('assets/survey-orang-tua.png') }}" alt="Pola Asuh Orang Tua"
                    class="w-full h-48 object-cover mb-4 rounded-lg">
                <h3 class="text-xl font-semibold text-black mb-2">Pola Asuh Orang Tua</h3>
                <p class="text-gray-700 mb-4">Kami ingin tahu lebih banyak tentang pola asuh yang diterapkan oleh orang
                    tua dan dampaknya terhadap kesehatan gigi anak.</p>
                <div class="mt-auto">
                    <a href="{{ route('asuh') }}"
                        class="relative inline-block px-6 py-2 border border-[#5DB9FF] text-black rounded-full overflow-hidden group">
                        <span
                            class="absolute inset-0 w-full h-full bg-[#5DB9FF] transform -translate-x-full transition-transform duration-300 ease-in-out group-hover:translate-x-0"></span>
                        <span
                            class="relative z-10 transition-colors duration-300 ease-in-out group-hover:text-white">Ikuti
                            Survei</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
