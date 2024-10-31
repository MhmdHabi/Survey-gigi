<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    // Menampilkan daftar survei
    public function index()
    {
        $surveys = Survey::with('questions.answers')->withCount('questions')->get();

        return view('surveys.index', compact('surveys'));
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
    public function susu($id)
    {
        $survey = Survey::findOrFail($id);
        // Assuming there's a relationship between Survey and Question
        $questions = $survey->questions()->with('answers')->get();
        return view('home.survey.susu-formula', compact('survey', 'questions'));
    }
    public function gigi()
    {
        return view('home.survey.sikat-gigi');
    }
    public function asuh($id)
    {

        return view('home.survey.pola-asuh');
    }
}
