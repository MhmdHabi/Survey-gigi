<?php

namespace Database\Seeders;

use App\Models\ResponseAnswer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResponseAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ResponseAnswer::create([
            'survey_response_id' => 1, // ID dari SurveyResponse yang sudah dibuat
            'question_id' => 1, // ID Pertanyaan
            'answer_id' => 1, // ID Jawaban (misalnya 'Ya, setiap hari')
            'text_response' => null
        ]);

        ResponseAnswer::create([
            'survey_response_id' => 1, // ID dari SurveyResponse yang sudah dibuat
            'question_id' => 2, // ID Pertanyaan
            'text_response' => '6 bulan lalu' // Jawaban teks
        ]);
    }
}
