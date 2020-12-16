<?php

namespace App\Controller;

use App\Model\User;

class IndexController
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
