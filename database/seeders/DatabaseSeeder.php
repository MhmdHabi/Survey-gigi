<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users
        $users = \App\Models\User::factory(10)->create();

        // Create 10 surveys with 5 questions each
        $surveys = \App\Models\Survey::factory(10)
            ->create()
            ->each(function ($survey) use ($users) {
                // Create 5 questions for each survey
                $questions = \App\Models\Question::factory(5)->create([
                    'survey_id' => $survey->id,
                ]);

                // Optionally, you can create answers for each question
                foreach ($questions as $question) {
                    // Assuming you want to create multiple choice answers
                    \App\Models\Answer::factory(3)->create([
                        'question_id' => $question->id,
                    ]);
                }
            });

        // Create 10 survey responses with associated response answers
        \App\Models\SurveyResponse::factory(10)
            ->create()
            ->each(function ($response) {
                // For each survey response, create responses for each question in the associated survey
                $questions = $response->survey->questions;

                foreach ($questions as $question) {
                    // Assuming you want to randomly associate an answer
                    $answer = $question->answers->random();

                    // Create a response answer for each question
                    \App\Models\ResponseAnswer::factory()->create([
                        'survey_response_id' => $response->id,
                        'question_id' => $question->id,
                        'answer_id' => $answer->id, // Associate with a specific answer
                        'text_response' => $this->getSampleTextResponse($question->type),
                    ]);
                }
            });
    }

    private function getSampleTextResponse($type)
    {
        // Generate sample text responses based on question type
        return $type === 'multiple_choice' ? null : \Faker\Factory::create()->sentence;
    }
}
