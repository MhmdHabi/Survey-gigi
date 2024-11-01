<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::with('questions.answers')->withCount('questions')->get();

        return view('admin.surveys.index', compact('surveys'));
    }

    public function show($id)
    {
        $survey = Survey::with(['questions.answers', 'questions.category']) // Menyertakan relasi category
            ->findOrFail($id);

        // Mengurutkan pertanyaan berdasarkan category_id
        $survey->questions = $survey->questions->sortBy('category_id');

        return view('admin.surveys.show', compact('survey'));
    }

    public function create()
    {
        // Fetch categories from the database
        $categories = Category::all();
        return view('admin.surveys.buat', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'questions.*.category_id' => 'nullable|exists:categories,id',
            'questions.*.question_text' => 'required|string',
            'answers.*.*.answer_text' => 'required|string',
            'answers.*.*.value' => 'required|integer',
        ]);

        // Create the survey
        $survey = new Survey();
        $survey->title = $validatedData['title'];
        $survey->description = $validatedData['description'];

        // Process and store the image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('survey', $filename, 'public'); // Store the image in the public disk
            $survey->image = $path; // Save the path to the survey model
        }

        // Save the survey to the database
        $survey->save();

        // Save the questions and their respective answers
        foreach ($validatedData['questions'] as $questionData) {
            $question = new Question();
            $question->question_text = $questionData['question_text'];
            $question->category_id = $questionData['category_id'];
            $question->survey_id = $survey->id; // Associate question with the survey
            $question->save();

            // Save answers for each question
            foreach ($request->input('answers.' . array_search($questionData, $validatedData['questions'])) as $answerData) {
                $answer = new Answer();
                $answer->question_id = $question->id; // Associate answer with the question
                $answer->answer_text = $answerData['answer_text'];
                $answer->value = $answerData['value'];
                $answer->user_id = auth()->id(); // Associate answer with the logged-in user
                $answer->save();
            }
        }

        // Retrieve all surveys with questions and answers
        $surveys = Survey::with('questions.answers')->withCount('questions')->get();

        return view('admin.surveys.index', compact('surveys'));
    }
}
