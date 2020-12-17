<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Model\User;
use Klein\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $login = $request->login;
        $password = $request->password;

        $user = User::where('login', $login)
            ->where('password', $password)
            ->get();

        // TO DO : Finalizar Login
    }

    public function logout()
    {
        // TO DO : Finalizar Logout
    }
}
