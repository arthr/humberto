<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use Klein\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
}
