<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $questionId = 1; // ID Pertanyaan pertama

        Answer::insert([
            ['question_id' => $questionId, 'answer_text' => 'Pernah'],
            ['question_id' => $questionId, 'answer_text' => 'Tidak Pernah'],
        ]);
    }
}
