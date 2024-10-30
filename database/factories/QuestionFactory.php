<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_text' => $this->faker->sentence, // Generate a random question
            'type' => $this->faker->randomElement(['multiple_choice', 'text']), // Random type
            'survey_id' => \App\Models\Survey::factory(), // Associate with a survey
        ];
    }
}
