<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        return view('home.home', compact('surveys'));
    }

    public function about()
    {
        return view('tentang-kami.tentang-kami');
    }
    public function dashboard()
    {
        $surveys = Survey::all();
        return view('home.home', compact('surveys'));
    }
}
