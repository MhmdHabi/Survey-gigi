@extends('layouts.app')

@section('title', 'Buat Survei')

@section('content')
    <div class="container mx-auto mt-4">
        <h2 class="text-2xl font-bold">Buat Survei Baru</h2>
        <form action="{{ route('surveys.store') }}" method="POST" id="surveyForm">
            @csrf
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
                <div class="mb-4 question">
                    <label for="question_text" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                    <input type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                        name="questions[0][question_text]" required>

                    <h5 class="mt-2 font-medium">Jawaban</h5>
                    <div class="answers-container">
                        <div class="flex items-center mt-2">
                            <input type="radio" class="mr-2" name="questions[0][selected_answer]" value="Pernah"
                                required>
                            <label class="block text-sm font-medium text-gray-700">Pernah</label>
                        </div>
                        <div class="flex items-center mt-2">
                            <input type="radio" class="mr-2" name="questions[0][selected_answer]" value="Tidak Pernah"
                                required>
                            <label class="block text-sm font-medium text-gray-700">Tidak Pernah</label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded"
                id="addQuestion">Tambah Pertanyaan</button>
            <button type="submit" class="mt-4 bg-green-500 text-white font-semibold py-2 px-4 rounded">Simpan
                Survei</button>
        </form>
    </div>

    <script>
        document.getElementById('addQuestion').addEventListener('click', function() {
            const questionsContainer = document.getElementById('questionsContainer');
            const index = questionsContainer.children.length;
            const questionHTML = `
        <div class="mb-4 question">
            <label for="question_text" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
            <input type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="questions[${index}][question_text]" required>

            <h5 class="mt-2 font-medium">Jawaban</h5>
            <div class="answers-container">
                <div class="flex items-center mt-2">
                    <input type="radio" class="mr-2" name="questions[${index}][selected_answer]" value="Pernah" required>
                    <label class="block text-sm font-medium text-gray-700">Pernah</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="radio" class="mr-2" name="questions[${index}][selected_answer]" value="Tidak Pernah" required>
                    <label class="block text-sm font-medium text-gray-700">Tidak Pernah</label>
                </div>
            </div>
            <button type="button" class="mt-2 bg-red-500 text-white font-semibold py-1 px-3 rounded removeQuestion">Hapus</button>
        </div>`;
            questionsContainer.insertAdjacentHTML('beforeend', questionHTML);
        });

        document.addEventListener('click', function(e) {
            // Remove question
            if (e.target.classList.contains('removeQuestion')) {
                e.target.closest('.question').remove();
            }
        });
    </script>

@endsection
