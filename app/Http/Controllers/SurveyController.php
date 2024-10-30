<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;


class SurveyController extends Controller
{
    // Menampilkan daftar survei
    public function index()
    {
        $surveys = Survey::with('questions.answers')->withCount('questions')->get();

        return view('surveys.index', compact('surveys'));
    }

    // Menampilkan form untuk membuat survei baru
    public function tampil()
    {
        return view('surveys.buat');
    }

    // Menyimpan survei baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'questions' => 'required|array',
            'questions.*.question_text' => 'required|string|max:255',
            'questions.*.type' => 'required|in:multiple_choice,text',
            'questions.*.answers' => 'required_if:questions.*.type,multiple_choice|array',
            'questions.*.answers.*' => 'required_if:questions.*.type,multiple_choice|string|max:255',
        ]);

        // Simpan survei
        $survey = Survey::create($request->only('title', 'description'));

        // Simpan pertanyaan dan jawabannya
        foreach ($request->questions as $questionData) {
            $question = $survey->questions()->create([
                'question_text' => $questionData['question_text'],
                'type' => $questionData['type'],
            ]);

            if ($questionData['type'] === 'multiple_choice') {
                foreach ($questionData['answers'] as $answerText) {
                    $question->answers()->create(['answer_text' => $answerText]);
                }
            }
        }

        return redirect()->route('surveys.index')->with('success', 'Survey berhasil dibuat');
    }

    // Menampilkan detail survei dengan pertanyaan
    public function show($id)
    {
        $survey = Survey::with('questions.answers')->findOrFail($id);
        return view('surveys.show', compact('survey'));
    }

    // Menampilkan form untuk mengedit survei
    public function edit($id)
    {
        $survey = Survey::with('questions.answers')->findOrFail($id);
        return view('surveys.edit', compact('survey'));
    }

    // Mengupdate survei
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Mengupdate survei
        $survey = Survey::findOrFail($id);
        $survey->update($request->only('title', 'description'));

        return redirect()->route('surveys.index')->with('success', 'Survey berhasil diupdate');
    }


    // Menghapus survei
    public function destroy($id)
    {
        $survey = Survey::findOrFail($id);
        $survey->delete();

        return redirect()->route('surveys.index')->with('success', 'Survey berhasil dihapus');
    }
    public function susu()
    {
        return view('home.survey.susu-formula');
    }
    public function gigi()
    {
        return view('home.survey.sikat-gigi');
    }
    public function asuh()
    {
        return view('home.survey.pola-asuh');
    }
}
