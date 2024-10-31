<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
