<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['survey_id', 'question_text', 'type'];

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
}
