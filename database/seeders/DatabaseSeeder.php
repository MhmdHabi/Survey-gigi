<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Answer; // Pastikan Anda menambahkan ini
use App\Models\SurveyResponse;
use App\Models\ResponseAnswer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 1 admin user
        User::create([
            'name' => 'Admin User',
            'age' => 30,
            'email' => 'admin@example.com',
            'gender' => 'laki_laki', // or 'perempuan'
            'role' => 'admin',
            'password' => bcrypt('12345678'), // Secure password
        ]);

        // Create 1 regular user
        User::create([
            'name' => 'Regular User',
            'age' => 25,
            'email' => 'user@example.com',
            'gender' => 'perempuan',
            'role' => 'user',
            'password' => bcrypt('12345678'),
        ]);

        // Create 5 users that will respond to surveys
        $respondents = User::factory(5)->create();

        // Create a survey with 5 questions
        $survey = Survey::factory()->create();

        // Create 5 questions for the survey
        $questions = Question::factory(5)->create(['survey_id' => $survey->id]);

        // Create answers for each question
        foreach ($questions as $question) {
            // Create answer options for the question
            Answer::create(['question_id' => $question->id, 'answer_text' => 'Pernah', 'value' => 1, 'user_id' => 1]);
            Answer::create(['question_id' => $question->id, 'answer_text' => 'Tidak Pernah', 'value' => 0, 'user_id' => 1]);
        }

        // Create survey responses for each respondent
        foreach ($respondents as $respondent) {
            // Create a survey response for the user
            $surveyResponse = SurveyResponse::create([
                'user_id' => $respondent->id,
                'survey_id' => $survey->id,
                'child_name' => 'Agus',
                'birth_date' => fake()->date(),
            ]);
        }
    }
}
