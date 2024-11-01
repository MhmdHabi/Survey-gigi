<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    // In App\Models\Question
    protected $fillable = ['question_text', 'type', 'survey_id', 'category_id'];


    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function getResponsesCountAttribute()
    {
        return $this->responses()->count();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // Question.php
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function surveyResult()
    {
        return $this->hasMany(SurveyResult::class);
    }
    public function surveyResults()
    {
        return $this->hasMany(SurveyResult::class);
    }
}
