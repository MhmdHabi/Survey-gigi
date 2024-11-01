<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyResponse;
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

        // Ambil pertanyaan beserta jawabannya dan kategori
        $questions = $survey->questions()->with(['answers', 'category'])->get()->groupBy('category_id');

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

    public function resultsSurvey($surveyResponseId)
    {
        $surveyResponse = SurveyResponse::where('survey_responses.id', $surveyResponseId) // Menyebutkan alias tabel
            ->join('surveys', 'survey_responses.survey_id', '=', 'surveys.id')
            ->join('users', 'survey_responses.user_id', '=', 'users.id') // Bergabung dengan tabel users
            ->select(
                'surveys.title',
                'survey_responses.child_name',
                'survey_responses.birth_date',
                'survey_responses.gender',
                'survey_responses.hasil',
                'users.name as parent_name'
            )
            ->firstOrFail(); // Mendapatkan hasil pertama atau gagal jika tidak ditemukan

        return view('home.survey.hasil-survey', compact('surveyResponse')); // Kirim data ke view
    }
}
