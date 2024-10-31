<?php

namespace Database\Seeders;

use App\Models\Survey;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    public function run()
    {
        $survey = Survey::factory()->create();

        // Buat 5 pertanyaan untuk survei ini
        $questions = Question::factory(5)->create([
            'survey_id' => $survey->id,
        ]);

        // Tambahkan dua jawaban untuk setiap pertanyaan
        foreach ($questions as $question) {
            Answer::factory()->create([
                'question_id' => $question->id,
                'answer_text' => 'Pernah',
                'value' => 1,
            ]);

            Answer::factory()->create([
                'question_id' => $question->id,
                'answer_text' => 'Tidak Pernah',
                'value' => 0,
            ]);
        }
    }
}
