<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $questions = Question::all();

        foreach ($questions as $question) {
            // Create 10 responses for each question
            Answer::factory(10)->create([
                'question_id' => $question->id, // Assuming your answers table has a question_id foreign key
            ]);
        }
    }
}
