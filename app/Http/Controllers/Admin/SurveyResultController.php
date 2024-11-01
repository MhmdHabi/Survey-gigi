<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SurveyResponse;
use App\Models\SurveyResult;
use Illuminate\Http\Request;

class SurveyResultController extends Controller
{
    public function showSurveyResults($surveyId, $surveyResponId)
    {
        $surveyResponses = SurveyResult::with(['survey', 'user', 'question', 'answer'])
            ->where('survey_id', $surveyId)
            ->where('survey_respon_id', $surveyResponId)
            ->get();



        return view('admin.result.show', compact('surveyResponses'));
    }
}
