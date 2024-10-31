<?php

namespace Database\Factories;

use App\Models\SurveyResponse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SurveyResponse>
 */
class SurveyResponseFactory extends Factory
{
    protected $model = SurveyResponse::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'survey_id' => \App\Models\Survey::factory(), // Associate with a survey
            'user_id' => \App\Models\User::factory(),
            'child_name' => $this->faker->name, // Generate a random name for the child
            'birth_date' => $this->faker->date('Y-m-d', 'now'),
            'gender' => $this->faker->randomElement(['laki-laki', 'perempuan']), // Generate a random birth date
        ];
    }
}
