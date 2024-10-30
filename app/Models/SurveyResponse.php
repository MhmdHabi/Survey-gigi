<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyResponse extends Model
{
    use HasFactory;

    protected $fillable = ['survey_id', 'child_name', 'birth_date'];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function responseAnswers()
    {
        return $this->hasMany(ResponseAnswer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
