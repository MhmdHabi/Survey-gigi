<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\SurveyResponse;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function user()
    {
        // Retrieve all users with the role of 'user'
        $users = User::where('role', 'user')->get();

        // Return the view with the users data
        return view('admin.users.index', compact('users'));
    }
}
