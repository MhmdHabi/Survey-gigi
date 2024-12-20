<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SurveyResponse extends Model
{
    use HasFactory;

    protected $fillable = ['survey_id', 'child_name', 'birth_date', 'gender', 'user_id', 'id', 'image_id'];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function surveyResult(): HasMany
    {
        return $this->hasMany(SurveyResult::class);
    }


    public function surveyResults()
    {
        return $this->hasMany(SurveyResult::class);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id'); // Specify the foreign key explicitly
    }
}
