<section id="survey" class="bg-blue-50 py-16">
    <div class="container mx-auto px-8 md:px-16">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-black mb-10">Survei Kesehatan Gigi</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($surveys as $survey)
                <div class="border rounded-lg p-4 bg-white shadow-md flex flex-col" data-aos="fade-up"
                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                    <img src="{{ asset('storage/' . $survey->image) }}" alt="{{ $survey->title }}"
                        class="w-full h-48 object-cover mb-4 rounded-lg">
                    <h3 class="text-xl font-semibold text-black mb-2">{{ $survey->title }}</h3>
                    <p class="text-gray-700 mb-4 text-justify">{{ $survey->description }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('susu', $survey->id) }}"
                            class="relative inline-block px-6 py-2 border border-[#5DB9FF] text-black rounded-full overflow-hidden group">
                            <span
                                class="absolute inset-0 w-full h-full bg-[#5DB9FF] transform -translate-x-full transition-transform duration-300 ease-in-out group-hover:translate-x-0"></span>
                            <span
                                class="relative z-10 transition-colors duration-300 ease-in-out group-hover:text-white">Ikuti
                                Survei</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
