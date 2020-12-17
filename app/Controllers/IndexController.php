<?php

namespace App\Controllers;

use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'executionTime' => number_format((microtime(true) - APP_START), 5)
        ]);
    }

    public function usuario($id)
    {
        return User::find($id);
    }
}
