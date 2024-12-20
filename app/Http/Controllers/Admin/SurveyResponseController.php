<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;

class SurveyResponseController extends Controller
{
    public function index()
    {
        $surveyResponses = SurveyResponse::with(['survey', 'user', 'image']) // Eager load surveys, users, and images
            ->select('survey_id', 'user_id', 'child_name', 'birth_date', 'gender', 'hasil', 'id', 'image_id') // Include 'image_id'
            ->get();

        return view('admin.result.hasil', compact('surveyResponses'));
    }
}
