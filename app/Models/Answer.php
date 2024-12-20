<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'answer_text', 'response_count', 'user_id', 'value'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function surveyResult()
    {
        return $this->hasMany(SurveyResult::class);
    }
    protected $casts = [
        'response_count' => 'integer',
    ];
    public function surveyResults()
    {
        return $this->hasMany(SurveyResult::class);
    }
}
