<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    // Menampilkan pertanyaan untuk survei tertentu
    public function index($surveyId)
    {
        $survey = Survey::with('questions.answers')->findOrFail($surveyId);
        return view('questions.index', compact('survey'));
    }

    // Menampilkan form untuk membuat pertanyaan baru
    public function create($surveyId)
    {
        return view('questions.create', compact('surveyId'));
    }


    // Menyimpan pertanyaan baru
    public function store(Request $request, $surveyId)
    {
        $validatedData = $request->validate([
            'question_text' => 'required|string|max:255',
            'type' => 'required|string|in:text,multiple_choice',
            'answers.*' => 'nullable|string|max:255',
        ]);

        $question = new Question();
        $question->question_text = $validatedData['question_text'];
        $question->type = $validatedData['type'];
        $question->survey_id = $surveyId; // Menghubungkan pertanyaan dengan survei
        $question->save();

        // Jika tipe pertanyaan adalah pilihan ganda, simpan jawabannya
        if ($validatedData['type'] === 'multiple_choice') {
            foreach ($request->answers as $answerText) {
                if ($answerText) {
                    $question->answers()->create(['answer_text' => $answerText]);
                }
            }
        }

        return redirect()->route('surveys.index')->with('success', 'Pertanyaan berhasil ditambahkan');
    }
}
