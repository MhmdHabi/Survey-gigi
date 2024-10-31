@extends('layouts.app')

@section('title', 'Tambah Pertanyaan')

@section('content')
    <div class="container mx-auto mt-6">
        <h2 class="text-2xl font-bold mb-4">Tambah Pertanyaan untuk Survei: {{ $surveyId }}</h2>
        <form action="{{ route('questions.store', $surveyId) }}" method="POST" id="questionForm">
            @csrf
            <div class="mb-4">
                <label for="question_text" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    name="question_text" required>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Tipe Pertanyaan</label>
                <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" name="type"
                    id="type" required>
                    <option value="text">Teks</option>
                    <option value="multiple_choice">Pilihan Ganda</option>
                </select>
            </div>

            <div id="answersContainer" class="mb-4 hidden">
                <label for="answers" class="block text-sm font-medium text-gray-700">Pilihan</label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    name="answers[]" placeholder="Jawaban 1">
                <input type="text" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    name="answers[]" placeholder="Jawaban 2">
                <button type="button" class="mt-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded"
                    id="addAnswer">Tambah Jawaban</button>
            </div>

            <button type="submit"
                class="mt-4 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Simpan
                Pertanyaan</button>
            <a href="{{ route('surveys.index') }}"
                class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Kembali</a>
        </form>
    </div>

    <script>
        document.getElementById('type').addEventListener('change', function() {
            const answersContainer = document.getElementById('answersContainer');
            if (this.value === 'multiple_choice') {
                answersContainer.classList.remove('hidden');
            } else {
                answersContainer.classList.add('hidden');
                // Clear any existing answer inputs when switching to text type
                answersContainer.innerHTML = `
                    <label for="answers" class="block text-sm font-medium text-gray-700">Pilihan</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" name="answers[]" placeholder="Jawaban 1">
                    <input type="text" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm p-2" name="answers[]" placeholder="Jawaban 2">
                    <button type="button" class="mt-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded" id="addAnswer">Tambah Jawaban</button>
                `;
            }
        });

        document.getElementById('addAnswer').addEventListener('click', function() {
            const answersContainer = document.getElementById('answersContainer');
            const newAnswerInput = document.createElement('input');
            newAnswerInput.type = 'text';
            newAnswerInput.className = 'mt-2 block w-full border border-gray-300 rounded-md shadow-sm p-2';
            newAnswerInput.name = 'answers[]';
            newAnswerInput.placeholder = 'Jawaban baru';
            answersContainer.appendChild(newAnswerInput);
        });
    </script>
@endsection
