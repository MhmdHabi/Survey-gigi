<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];
    // Category.php
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
