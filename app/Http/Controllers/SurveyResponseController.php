<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyResponse;
use App\Models\ResponseAnswer;
use App\Models\SurveyResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        // Create a new SurveyResponse
        $surveyResponse = SurveyResponse::create([
            'survey_id' => $surveyId,
            'child_name' => $request->child_name,
            'birth_date' => $request->birth_date,
            'user_id' => auth()->id(), // Assuming the user is authenticated
        ]);

        // Iterate through responses to save each answer
        foreach ($request->responses as $questionId => $response) {
            if (is_array($response)) {
                $answerId = $response['answer_id'] ?? null;
                $textResponse = $response['text_response'] ?? null;
            } else {
                $answerId = $response;
                $textResponse = null;
            }

            // Create response answer
            $surveyResponse->answers()->create([
                'question_id' => $questionId,
                'answer_id' => $answerId,
                'text_response' => $textResponse,
            ]);

            // Save to SurveyResult
            SurveyResult::create([
                'user_id' => auth()->id(),
                'survey_id' => $surveyId,
                'question_id' => $questionId,
                'answer_id' => $answerId,
                'survey_respon_id' => $surveyResponse->id,
            ]);
        }

        return redirect()->route('surveys.index')->with('success', 'Respons berhasil disimpan');
    }




    public function submit(Request $request, $surveyId)
    {
        // Validate the request data
        $request->validate([
            'child_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:laki-laki,perempuan',
            'answers' => 'required|array', // Assuming 'answers' is an array of selected answers
            'answers.*' => 'exists:answers,id', // Ensure each answer ID exists in the answers table
        ]);

        // Create the survey response
        $surveyResponse = SurveyResponse::create([
            'survey_id' => $surveyId,
            'user_id' => auth()->id(),
            'child_name' => $request->child_name,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
        ]);

        // Initialize variables for calculation
        $totalQuestions = Question::where('survey_id', $surveyId)->count(); // Get total number of questions
        $correctAnswersCount = 0; // Count of answers with value 1

        // Loop through the selected answers and store them in SurveyResult
        foreach ($request->answers as $answerId) {
            $answer = Answer::find($answerId);

            // Increment response count
            $answer->increment('response_count');

            // Check if the answer value is 1
            if ($answer->value == 1) { // Assuming you have a 'value' column in the 'answers' table
                $correctAnswersCount++;
            }

            // Create a new SurveyResult entry for each answer
            SurveyResult::create([
                'user_id' => auth()->id(),
                'survey_id' => $surveyId,
                'question_id' => $answer->question_id, // Assuming Answer model has a question_id relation
                'answer_id' => $answerId,
                'survey_respon_id' => $surveyResponse->id,
            ]);
        }

        // Calculate the result (hasil)
        $hasil = $totalQuestions > 0 ? ($correctAnswersCount / $totalQuestions) * 100 : 0; // Convert to percentage

        // Update the survey response with the calculated result
        $surveyResponse->hasil = $hasil;
        $surveyResponse->save(); // Save the updated response

        // Redirect to the survey results page with the correct surveyResponseId
        return redirect()->route('survey.results.get', ['surveyResponseId' => $surveyResponse->id])
            ->with('success', 'Survey submitted successfully!');
    }


    public function results()
    {
        $surveyResponses = SurveyResponse::where('user_id', auth()->id())
            ->join('surveys', 'survey_responses.survey_id', '=', 'surveys.id')
            ->join('users', 'survey_responses.user_id', '=', 'users.id')
            ->select(
                'survey_responses.id', // Add this line to select the id
                'surveys.title',
                'survey_responses.child_name',
                'survey_responses.birth_date',
                'survey_responses.gender',
                'survey_responses.hasil',
                'users.name as parent_name'
            )
            ->get();

        return view('surveys.results', compact('surveyResponses'));
    }

    public function showHasil($surveyResponseId)
    {
        // Retrieve the survey response and related results
        $surveyResponse = SurveyResponse::with('user')->findOrFail($surveyResponseId);

        // Get the associated survey results for the given survey response
        $surveyResults = SurveyResult::with(['survey', 'question', 'answer'])
            ->where('survey_respon_id', $surveyResponseId)
            ->get();

        return view('surveys.show-result', compact('surveyResults', 'surveyResponse'));
    }
}
