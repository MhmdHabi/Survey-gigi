<?php

namespace Database\Factories;

use App\Models\ResponseAnswer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResponseAnswer>
 */
class ResponseAnswerFactory extends Factory
{
    protected $model = ResponseAnswer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'survey_response_id' => \App\Models\SurveyResponse::factory(), // Associate with a survey response
            'question_id' => \App\Models\Question::factory(), // Associate with a question
            'answer_id' => \App\Models\Answer::factory(), // Assuming the response is a text answer
            'text_response' => $this->faker->word,
            'user_id' => \App\Models\User::factory(),
            // Add other fields as necessary
        ];
    }
}
