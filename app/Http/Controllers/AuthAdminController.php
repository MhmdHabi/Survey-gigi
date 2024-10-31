<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    public function index()
    {
        return view('auth.login-admin');
    }
}
