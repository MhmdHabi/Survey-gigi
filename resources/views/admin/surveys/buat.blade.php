@extends('layouts.dashboard')

@section('title', 'Buat Survei')

@section('content')
    <div class="container mx-auto mt-4">
        <h2 class="text-2xl font-bold">Buat Survei Baru</h2>
        <form action="{{ route('surveys.store') }}" method="POST" id="surveyForm">
            @csrf
            {{-- <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Unggah Foto (opsional)</label>
                <input type="file" id="photo" name="photo" accept="image/*"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div> --}}

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Survei</label>
                <input type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="title" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Survei</label>
                <textarea class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="description" required></textarea>
            </div>

            <div id="questionsContainer">
                <h4 class="text-xl font-semibold mb-2">Pertanyaan</h4>
                <div class="mb-4 question" data-question-index="0">
                    <label for="category_0" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="category_0" name="questions[0][category_id]"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md category-select" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <label for="question_text_0" class="block text-sm font-medium text-gray-700 mt-2">Pertanyaan</label>
                    <input type="text" id="question_text_0"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="questions[0][question_text]"
                        required>

                    <h5 class="mt-2 font-medium">Jawaban</h5>
                    <div class="answers-container">
                        <div class="flex items-center mb-4 answer" data-answer-index="0">
                            <div class="flex-1">
                                <label for="answer_text_0_0" class="block text-sm font-medium text-gray-700">Jawaban</label>
                                <input type="text" id="answer_text_0_0"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                                    name="answers[0][0][answer_text]" required>

                                <label for="value_0_0" class="block text-sm font-medium text-gray-700 mt-2">Nilai</label>
                                <input type="number" id="value_0_0"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                                    name="answers[0][0][value]" required>
                            </div>
                            <div class="flex items-center ml-2">
                                <button type="button"
                                    class="mt-8 bg-red-500 text-white font-semibold py-1 px-3 rounded removeAnswer">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <button type="button"
                        class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded addAnswer">Tambah
                        Jawaban</button>
                    <button type="button"
                        class="mt-4 bg-red-500 text-white font-semibold py-2 px-4 rounded removeQuestion">Hapus
                        Pertanyaan</button>
                </div>
            </div>

            <button type="button" class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded"
                id="addQuestion">Tambah Pertanyaan</button>
            <button type="submit" class="mt-4 bg-green-500 text-white font-semibold py-2 px-4 rounded">Simpan
                Survei</button>
        </form>
    </div>

    <script>
        // Add new question
        document.getElementById('addQuestion').addEventListener('click', function() {
            const questionsContainer = document.getElementById('questionsContainer');
            const index = questionsContainer.children.length;
            const questionHTML = `
            <div class="mb-4 question" data-question-index="${index}">
                <label for="category_${index}" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select id="category_${index}" name="questions[${index}][category_id]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md category-select" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <label for="question_text_${index}" class="block text-sm font-medium text-gray-700 mt-2">Pertanyaan</label>
                <input type="text" id="question_text_${index}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="questions[${index}][question_text]" required>

                <h5 class="mt-2 font-medium">Jawaban</h5>
                <div class="answers-container">
                    <div class="flex items-center mb-4 answer" data-answer-index="0">
                        <div class="flex-1">
                            <label for="answer_text_${index}_0" class="block text-sm font-medium text-gray-700">Jawaban</label>
                            <input type="text" id="answer_text_${index}_0" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="answers[${index}][0][answer_text]" required>

                            <label for="value_${index}_0" class="block text-sm font-medium text-gray-700 mt-2">Nilai</label>
                            <input type="number" id="value_${index}_0" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="answers[${index}][0][value]" required>
                        </div>
                        <div class="flex items-center ml-2">
                            <button type="button" class="mt-8 bg-red-500 text-white font-semibold py-1 px-3 rounded removeAnswer">Hapus</button>
                        </div>
                    </div>
                </div>

                <button type="button" class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded addAnswer">Tambah Jawaban</button>
                <button type="button" class="mt-4 bg-red-500 text-white font-semibold py-2 px-4 rounded removeQuestion">Hapus Pertanyaan</button>
            </div>`;
            questionsContainer.insertAdjacentHTML('beforeend', questionHTML);
        });

        // Add new answer to specific question
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('addAnswer')) {
                const questionElement = e.target.closest('.question');
                const answersContainer = questionElement.querySelector('.answers-container');
                const questionIndex = questionElement.getAttribute('data-question-index');
                const answerIndex = answersContainer.children.length;

                const answerHTML = `
                <div class="flex items-center mb-4 answer" data-answer-index="${answerIndex}">
                    <div class="flex-1">
                        <label for="answer_text_${questionIndex}_${answerIndex}" class="block text-sm font-medium text-gray-700">Jawaban</label>
                        <input type="text" id="answer_text_${questionIndex}_${answerIndex}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="answers[${questionIndex}][${answerIndex}][answer_text]" required>

                        <label for="value_${questionIndex}_${answerIndex}" class="block text-sm font-medium text-gray-700 mt-2">Nilai</label>
                        <input type="number" id="value_${questionIndex}_${answerIndex}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="answers[${questionIndex}][${answerIndex}][value]" required>
                    </div>
                    <div class="flex items-center ml-2">
                        <button type="button" class="mt-8 bg-red-500 text-white font-semibold py-1 px-3 rounded removeAnswer">Hapus</button>
                    </div>
                </div>`;
                answersContainer.insertAdjacentHTML('beforeend', answerHTML);
            }
        });

        // Remove answer
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('removeAnswer')) {
                const answerElement = e.target.closest('.answer');
                answerElement.remove();
            }
        });

        // Remove question
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('removeQuestion')) {
                const questionElement = e.target.closest('.question');
                questionElement.remove();
            }
        });
    </script>
@endsection
