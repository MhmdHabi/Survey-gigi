@extends('layouts.dashboard')

@section('title', 'Buat Survei')

@section('content')
    <div class="container mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Buat Survei Baru</h2>

        <!-- Back to Surveys Index Button -->
        <a href="{{ route('surveys.index') }}" class="inline-block mb-4 text-sm font-medium text-blue-500 hover:underline">
            &larr; Kembali ke Daftar Survei
        </a>

        <form action="{{ route('surveys.store') }}" method="POST" id="surveyForm">
            @csrf

            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Survei</label>
                <input type="text"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500"
                    name="title" required>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Survei</label>
                <textarea
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500"
                    name="description" required></textarea>
            </div>

            <div id="questionsContainer" class="mb-8">
                <h4 class="text-xl font-semibold mb-4 text-gray-800">Pertanyaan</h4>
                <div class="mb-6 question" data-question-index="0">
                    <label for="category_0" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="category_0" name="questions[0][category_id]"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500"
                        required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <label for="question_text_0" class="block text-sm font-medium text-gray-700 mt-2">Pertanyaan</label>
                    <input type="text" id="question_text_0"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500"
                        name="questions[0][question_text]" required>

                    <h5 class="mt-4 font-medium text-gray-700">Jawaban</h5>
                    <div class="answers-container">
                        <div class="flex items-center mb-4 answer" data-answer-index="0">
                            <div class="flex-1">
                                <label for="answer_text_0_0" class="block text-sm font-medium text-gray-700">Jawaban</label>
                                <input type="text" id="answer_text_0_0"
                                    class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500"
                                    name="answers[0][0][answer_text]" required>

                                <label for="value_0_0" class="block text-sm font-medium text-gray-700 mt-2">Nilai</label>
                                <input type="number" id="value_0_0"
                                    class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500"
                                    name="answers[0][0][value]" required>
                            </div>
                            <div class="flex items-center ml-2">
                                <button type="button"
                                    class="mt-8 bg-red-500 text-white font-semibold py-1 px-3 rounded hover:bg-red-600">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <button type="button"
                        class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 addAnswer">Tambah
                        Jawaban</button>
                    <button type="button"
                        class="mt-4 bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600 removeQuestion">Hapus
                        Pertanyaan</button>
                </div>
            </div>

            <button type="button" class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600"
                id="addQuestion">Tambah Pertanyaan</button>
            <button type="submit"
                class="mt-4 bg-green-500 text-white font-semibold py-2 px-4 rounded hover:bg-green-600">Simpan
                Survei</button>
        </form>
    </div>

    <script>
        // Add new question
        document.getElementById('addQuestion').addEventListener('click', function() {
            const questionsContainer = document.getElementById('questionsContainer');
            const index = questionsContainer.children.length;
            const questionHTML = `
            <div class="mb-6 question" data-question-index="${index}">
                <label for="category_${index}" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select id="category_${index}" name="questions[${index}][category_id]" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <label for="question_text_${index}" class="block text-sm font-medium text-gray-700 mt-2">Pertanyaan</label>
                <input type="text" id="question_text_${index}" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500" name="questions[${index}][question_text]" required>

                <h5 class="mt-4 font-medium text-gray-700">Jawaban</h5>
                <div class="answers-container">
                    <div class="flex items-center mb-4 answer" data-answer-index="0">
                        <div class="flex-1">
                            <label for="answer_text_${index}_0" class="block text-sm font-medium text-gray-700">Jawaban</label>
                            <input type="text" id="answer_text_${index}_0" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500" name="answers[${index}][0][answer_text]" required>

                            <label for="value_${index}_0" class="block text-sm font-medium text-gray-700 mt-2">Nilai</label>
                            <input type="number" id="value_${index}_0" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500" name="answers[${index}][0][value]" required>
                        </div>
                        <div class="flex items-center ml-2">
                            <button type="button" class="mt-8 bg-red-500 text-white font-semibold py-1 px-3 rounded hover:bg-red-600 removeAnswer">Hapus</button>
                        </div>
                    </div>
                </div>

                <button type="button" class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 addAnswer">Tambah Jawaban</button>
                <button type="button" class="mt-4 bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600 removeQuestion">Hapus Pertanyaan</button>
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
                        <input type="text" id="answer_text_${questionIndex}_${answerIndex}" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500" name="answers[${questionIndex}][${answerIndex}][answer_text]" required>

                        <label for="value_${questionIndex}_${answerIndex}" class="block text-sm font-medium text-gray-700 mt-2">Nilai</label>
                        <input type="number" id="value_${questionIndex}_${answerIndex}" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-green-200 focus:border-green-500" name="answers[${questionIndex}][${answerIndex}][value]" required>
                    </div>
                    <div class="flex items-center ml-2">
                        <button type="button" class="mt-8 bg-red-500 text-white font-semibold py-1 px-3 rounded hover:bg-red-600 removeAnswer">Hapus</button>
                    </div>
                </div>`;
                answersContainer.insertAdjacentHTML('beforeend', answerHTML);
            }

            // Remove answer
            if (e.target.classList.contains('removeAnswer')) {
                const answerElement = e.target.closest('.answer');
                answerElement.remove();
            }

            // Remove question
            if (e.target.classList.contains('removeQuestion')) {
                const questionElement = e.target.closest('.question');
                questionElement.remove();
            }
        });
    </script>
@endsection
