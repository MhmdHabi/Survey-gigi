<?php

namespace Database\Seeders;

use App\Models\SurveyResponse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveyResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        SurveyResponse::create([
            'survey_id' => 1,
            'user_id' => 1, // ID Survey yang sudah dibuat
            'child_name' => 'Budi',
            'birth_date' => '2015-06-15'
        ]);
    }
}
