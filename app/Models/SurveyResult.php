<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Question;

class SurveyResult extends Model
{
    use HasFactory;

    protected $fillable = ['survey_id', 'answer_id', 'question_id', 'user_id', 'survey_respon_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function surveyResponse(): BelongsTo
    {
        return $this->belongsTo(SurveyResponse::class, 'survey_respon_id');
    }
    public function survey_response()
    {
        return $this->belongsTo(SurveyResponse::class, 'survey_respon_id');
    }

    public static function getResultsBySurveyAndResponse($surveyId, $surveyResponseId)
    {
        return self::with(['question', 'answer'])
            ->where('survey_id', $surveyId)
            ->where('survey_respon_id', $surveyResponseId)
            ->get();
    }
}
