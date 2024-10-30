<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $surveys = Survey::factory(10)->create();

        foreach ($surveys as $survey) {
            // Create 5 questions for each survey
            Question::factory(5)->create([
                'survey_id' => $survey->id, // Assuming your questions table has a survey_id foreign key
            ]);
        }
    }
}
