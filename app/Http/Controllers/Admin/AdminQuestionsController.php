<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;

class AdminQuestionsController extends Controller
{
    public function buat($surveyId)
    {
        // Retrieve all categories for the dropdown
        $categories = Category::all();

        // Find the specified survey or fail
        $survey = Survey::findOrFail($surveyId);

        return view('admin.questions.create', compact('survey', 'categories'));
    }

    public function store(Request $request, $surveyId)
    {
        $survey = Survey::findOrFail($surveyId);

        // Validate incoming request data
        $validatedData = $request->validate([
            'category_id' => 'nullable|exists:categories,id', // Make category_id nullable
            'questions' => 'required|array', // Validate questions as an array
            'questions.*.question_text' => 'required|string|max:255', // Validate each question text
            'questions.*.answers' => 'required|array', // Validate each answers array
            'questions.*.answers.*.answer_text' => 'required|string|max:255', // Validate each answer text
            'questions.*.answers.*.value' => 'required|integer', // Validate each value
        ]);

        // Save questions and their answers
        foreach ($validatedData['questions'] as $questionData) {
            // Create and save the question
            $question = Question::create([
                'question_text' => $questionData['question_text'],
                'type' => 'multiple_choice', // Set type to 'multiple_choice'
                'survey_id' => $survey->id, // Associate the question with the survey
                'category_id' => $validatedData['category_id'] ?? null, // Set category_id to null if not provided
            ]);

            // Save answers
            foreach ($questionData['answers'] as $answer) {
                // Create each answer associated with the question
                $question->answers()->create([
                    'answer_text' => $answer['answer_text'],
                    'value' => $answer['value'],
                    'user_id' => auth()->id(), // Associate the answer with the logged-in user
                ]);
            }
        }

        return redirect()->route('surveys.show', $surveyId)
            ->with('success', 'Questions created successfully!');
    }
}
