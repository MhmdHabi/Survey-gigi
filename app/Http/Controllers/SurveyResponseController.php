<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyResponse;
use App\Models\ResponseAnswer;

class SurveyResponseController extends Controller
{
    // Menampilkan form untuk mengisi respons survei
    public function create($surveyId)
    {
        $survey = Survey::with('questions.answers')->findOrFail($surveyId);
        return view('responses.create', compact('survey'));
    }

    // Menyimpan respons survei
    public function store(Request $request, $surveyId)
    {
        $surveyResponse = SurveyResponse::create([
            'survey_id' => $surveyId,
            'child_name' => $request->child_name,
            'birth_date' => $request->birth_date,
        ]);

        foreach ($request->responses as $questionId => $response) {
            if (is_array($response)) {
                $answerId = $response['answer_id'] ?? null;
                $textResponse = $response['text_response'] ?? null;
            } else {
                $answerId = $response;
                $textResponse = null;
            }

            $surveyResponse->responseAnswers()->create([
                'question_id' => $questionId,
                'answer_id' => $answerId,
                'text_response' => $textResponse,
            ]);
        }

        return redirect()->route('surveys.index')->with('success', 'Respons berhasil disimpan');
    }
}
