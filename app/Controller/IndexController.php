<?php

namespace App\Controller;

use App\Model\User;

class IndexController
{
    public function index()
    {
        return env('APP_NAME');
    }

    public function usuario($id)
    {
        return User::find($id);
    }
}
