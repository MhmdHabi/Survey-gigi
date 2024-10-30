<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function susu()
    {
        return view('home.survey.susu-formula');
    }
    public function gigi()
    {
        return view('home.survey.sikat-gigi');
    }
    public function asuh()
    {
        return view('home.survey.pola-asuh');
    }
}
