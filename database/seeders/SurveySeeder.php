<?php

namespace Database\Seeders;

use App\Models\Answer;
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
        $survey = Survey::factory()->create();

        // Membuat 5 pertanyaan untuk survei ini
        for ($i = 1; $i <= 5; $i++) {
            $question = Question::factory()->create([
                'survey_id' => $survey->id,
                'question_text' => "Pernyataan $i",
            ]);

            // Menambahkan dua jawaban untuk setiap pertanyaan
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
