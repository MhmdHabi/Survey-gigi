<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'nilai_image',
        'keterangan',
        'id'
    ];

    public function surveyResponse()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}
