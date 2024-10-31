@extends('layouts.dashboard')

@section('title', 'Buat Pertanyaan')

@section('content')
    <div class="container mx-auto mt-4">
        <h2 class="text-2xl font-bold">Buat Pertanyaan Baru untuk Survei</h2>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('questions.store', ['survey' => $survey->id]) }}" method="POST" id="questionForm">
            @csrf

            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select id="category" name="category_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                    required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <h5 class="mt-2 font-medium">Pertanyaan</h5>
            <div class="questions-container">
                <div class="flex items-center mb-4 question" data-question-index="0">
                    <div class="flex-1">
                        <label for="question_text_0" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                        <input type="text" id="question_text_0"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                            name="questions[0][question_text]" required>

                        <h5 class="mt-2 font-medium">Jawaban</h5>
                        <div class="answers-container">
                            <div class="flex items-center mb-4 answer" data-answer-index="0">
                                <div class="flex-1">
                                    <label for="answer_text_0"
                                        class="block text-sm font-medium text-gray-700">Jawaban</label>
                                    <input type="text" id="answer_text_0"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                                        name="questions[0][answers][0][answer_text]" required>

                                    <label for="value_0" class="block text-sm font-medium text-gray-700 mt-2">Nilai</label>
                                    <input type="number" id="value_0"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                                        name="questions[0][answers][0][value]" required>
                                </div>
                                <div class="flex items-center ml-2">
                                    <button type="button"
                                        class="mt-8 bg-red-500 text-white font-semibold py-1 px-3 rounded removeAnswer">Hapus</button>
                                </div>
                            </div>
                        </div>
                        <button type="button"
                            class="mt-2 bg-blue-500 text-white font-semibold py-1 px-3 rounded addAnswer">Tambah
                            Jawaban</button>
                    </div>
                    <div class="flex items-center ml-2">
                        <button type="button"
                            class="mt-8 bg-red-500 text-white font-semibold py-1 px-3 rounded removeQuestion">Hapus
                            Pertanyaan</button>
                    </div>
                </div>
            </div>

            <button type="button" class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded addQuestion">Tambah
                Pertanyaan</button>
            <button type="submit" class="mt-4 bg-green-500 text-white font-semibold py-2 px-4 rounded">Simpan
                Pertanyaan</button>
        </form>
    </div>

    <script>
        // Add new question
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('addQuestion')) {
                const questionsContainer = document.querySelector('.questions-container');
                const questionIndex = questionsContainer.children.length;

                const questionHTML = `
                <div class="flex items-center mb-4 question" data-question-index="${questionIndex}">
                    <div class="flex-1">
                        <label for="question_text_${questionIndex}" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                        <input type="text" id="question_text_${questionIndex}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="questions[${questionIndex}][question_text]" required>

                        <h5 class="mt-2 font-medium">Jawaban</h5>
                        <div class="answers-container">
                            <div class="flex items-center mb-4 answer" data-answer-index="0">
                                <div class="flex-1">
                                    <label for="answer_text_${questionIndex}_0" class="block text-sm font-medium text-gray-700">Jawaban</label>
                                    <input type="text" id="answer_text_${questionIndex}_0" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="questions[${questionIndex}][answers][0][answer_text]" required>

                                    <label for="value_${questionIndex}_0" class="block text-sm font-medium text-gray-700 mt-2">Nilai</label>
                                    <input type="number" id="value_${questionIndex}_0" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="questions[${questionIndex}][answers][0][value]" required>
                                </div>
                                <div class="flex items-center ml-2">
                                    <button type="button" class="mt-8 bg-red-500 text-white font-semibold py-1 px-3 rounded removeAnswer">Hapus</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="mt-2 bg-blue-500 text-white font-semibold py-1 px-3 rounded addAnswer">Tambah Jawaban</button>
                    </div>
                    <div class="flex items-center ml-2">
                        <button type="button" class="mt-8 bg-red-500 text-white font-semibold py-1 px-3 rounded removeQuestion">Hapus Pertanyaan</button>
                    </div>
                </div>`;
                questionsContainer.insertAdjacentHTML('beforeend', questionHTML);
            }
        });

        // Add new answer to the question
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('addAnswer')) {
                const questionElement = e.target.closest('.question');
                const answersContainer = questionElement.querySelector('.answers-container');
                const answerIndex = answersContainer.children.length;

                const answerHTML = `
                <div class="flex items-center mb-4 answer" data-answer-index="${answerIndex}">
                    <div class="flex-1">
                        <label for="answer_text_${questionElement.dataset.questionIndex}_${answerIndex}" class="block text-sm font-medium text-gray-700">Jawaban</label>
                        <input type="text" id="answer_text_${questionElement.dataset.questionIndex}_${answerIndex}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="questions[${questionElement.dataset.questionIndex}][answers][${answerIndex}][answer_text]" required>

                        <label for="value_${questionElement.dataset.questionIndex}_${answerIndex}" class="block text-sm font-medium text-gray-700 mt-2">Nilai</label>
                        <input type="number" id="value_${questionElement.dataset.questionIndex}_${answerIndex}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="questions[${questionElement.dataset.questionIndex}][answers][${answerIndex}][value]" required>
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
